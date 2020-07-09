<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Project;
use App\Conversation;

class HomeController extends Controller
{

    public function welcome()
    {

        $users = User::all();

        return view('welcome', ['users' => $users]);

    }

    public function index(User $user)
    {

        if( $this->authorize('is-logged-in') ) {

            $open_projects = Project::where([
                                        ['completed_at', '=', null],
                                        ['user_assigned', '=', $user->id]
                                    ])->count();

            $closed_projects = Project::where([
                                        ['completed_at', '!=', null],
                                        ['user_assigned', '=', $user->id]
                                    ])->count();

            $all_projects = Project::where([
                                        ['completed_at', '=', null],
                                        ['user_assigned', '=', $user->id]
                                    ])->get();

            $total_projects = Project::where('user_assigned', '=', $user->id)->get();

            return view('employees/dashboard', [
                'user' => $user,
                'open_projects' => $open_projects,
                'closed_projects' => $closed_projects,
                'all_projects' => $all_projects,
                'total_projects' => $total_projects
            ]);

        }

    }

    public function admin_index(User $user)
    {

        if( $this->authorize('is-admin') ) {

            $open_projects = Project::where('completed_at', '=', null)->count();
            $closed_projects = Project::where('completed_at', '!=', null)->count();
            $all_projects = Project::all();

            $active_clients = Client::where('active', '=', 1)->count();
            $inactive_clients = Client::where('active', '!=', 1)->count();
            $total_clients = Client::count();

            $employees = User::orderBy('last_logged_in', 'DESC')->where('active', '=', 1)->paginate(5);

            return view('admin/dashboard', [
                'user' => $user,
                'open_projects' => $open_projects,
                'closed_projects' => $closed_projects,
                'all_projects' => $all_projects,
                'active_clients' => $active_clients,
                'inactive_clients' => $inactive_clients,
                'total_clients' => $total_clients,
                'employees' => $employees
            ]);

        }

    }

}
