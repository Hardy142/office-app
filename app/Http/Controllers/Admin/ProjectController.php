<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use App\Project;
use App\File;
use App\Conversation;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index() 
    {
        if( $this->authorize('is-admin') ) {

            $user = Auth::user();

            $clients = Client::orderby('name');
    
            $projects = Project::orderBy('number')->where('completed_at', '=', null)->get();
    
            return view('admin/projects/index', [
                'projects' => $projects,
                'clients' => $clients,
                'user' => $user
            ]);

        }

    }

    public function show(Project $project) 
    {

        if( $this->authorize('is-admin') ) {

            $user = Auth::user();

            return view('admin/projects/show', [
                'project' => $project,
                'user' => $user
            ]);

        }

    }

    public function create() 
    {

        if( $this->authorize('is-admin') ) {
            
            $user = Auth::user();

            $employees = User::orderBy('name')->where('role_id', '=', 3)->get();

            $clients = Client::orderBy('name')->get();

            $clients_sidebar = Client::orderBy('name')->paginate(10);

            return view('admin/projects/create', [
                'clients' => $clients,
                'user' => $user,
                'employees' => $employees,
                'clients_sidebar' => $clients_sidebar
            ]);

        }

    }

    public function edit(Project $project) 
    {

        if( $this->authorize('is-admin') ) {
         
            $user = Auth::user();

            $all_projects = Project::orderBy('created_at')->paginate(10);

            return view('admin/projects/edit', [
                'project' => $project,
                'user' => $user,
                'all_projects' => $all_projects
            ]);

        }

    }

    public function update(Project $project) 
    {

        if( $this->authorize('is-admin') ) {
         
            $project->update(request()->validate([
                'number' => ['required', 'unique:clients,number,' . $project->id],
                'name' => ['required', 'unique:clients,name,' . $project->id],
                'description' => ''
            ]));
    
            return redirect('admin/projects/' . $project->id);

        }

    }

    public function store() 
    {
        if( $this->authorize('is-admin') ) {
         
            $last_id = Project::create(request()->validate([
                'number' => ['required', 'unique:projects,number'],
                'name' => ['required', 'unique:projects,name'],
                'description' => '',
                'client_id' => 'required',
                'user_assigned' => 'required',
                'due_date' => 'required',
                'user_created' => 'required'
            ]))->id;
                
            Conversation::create([
                'project_id' => $last_id
            ]);

            return redirect('/admin/projects/' . $last_id);

        }

    }

    public function fileUpload(Request $request)
    {
            
        $id = $request->input('project_id');

        $project = Project::where('id', $id)->first();

        $file = $request->file( 'file' );
        $file_type = $file->getMimeType();
        $fileName = $file->getClientOriginalName();
        $file->move(public_path( 'uploads/projects/' . $project->id . '-' . $project->name),$fileName );
        $path ='uploads/projects/' . $project->id . '-' . $project->name . '/' . $fileName;

        File::create([
            'name' => $fileName,
            'path' => $path,
            'project_id' => $project->id,
            'type' => $file_type
        ]);

    }
    
    public function projectFileDownload($id)
    {
            
        $file = File::findOrFail($id);

        return response()->download( public_path($file->path) );

    }

    public function complete($id)
    {

        if( $this->authorize('is-logged-in') ) {

            $project = Project::findOrFail($id);

            if($project->completed_at == null) {

                $project->completed_at = date('Y-m-d H:i:s');

            }else {

                $project->completed_at = null;

            }

            $project->save();

            return redirect('/admin/projects/' . $project->id);

        }

    }
}
