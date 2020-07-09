<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Conversation;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $projects = $user->activeAssignedProjects;

        return view('employees/projects/index', [
            'user' => $user,
            'projects' => $projects
        ]);

    }

    public function show($id)
    {

        $user = Auth::user();

        $project = Project::findOrFail($id);

        return view('employees/projects/show',[
            'user' => $user,
            'project' => $project
        ]);

    }
}
