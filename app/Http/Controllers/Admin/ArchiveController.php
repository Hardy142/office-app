<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Project;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index()
    {

        if( $this->authorize('is-logged-in') ) {

            $user = Auth::user();
            $projects = Project::where('completed_at', '!=', null)->get();
            $employees = User::where('active', '=', 0)->get();
            $clients = Client::where('active', '=', 0)->get();

            return view('admin/archives', [
                'user' => $user,
                'projects' => $projects,
                'employees' => $employees,
                'clients' => $clients
            ]);

        }

    }
}
