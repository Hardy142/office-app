<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function index() 
    {

        if( $this->authorize('is-admin') ) {

            $user = Auth::user();

            $clients = Client::orderBy('name')->where('active', '=', true)->paginate(10);

            return view('admin/clients/index', [
                'clients' => $clients,
                'user' => $user
            ]);
            
        }

    }

    public function show(Client $client) 
    {

        if( $this->authorize('is-admin') ) {

            $user = Auth::user();

            $all_clients = Client::orderBy('name')->where('active', '=', true)->paginate(10);

            return view('admin/clients/show', [
                'client' => $client,
                'user' => $user,
                'all_clients' => $all_clients
            ]);
            
        }

    }

    public function create() 
    {

        if( $this->authorize('is-admin') ) {

            $user = Auth::user();
        
            $clients = Client::orderBy('name')->where('active', '=', true)->paginate(10);

            return view('admin/clients/create', [
                'clients' => $clients,
                'user' => $user
            ]);
            
        }

    }

    public function edit(Client $client) 
    {

        if( $this->authorize('is-admin') ) {

            $user = Auth::user();

            $all_clients = Client::orderBy('name')->where('active', '=', true)->paginate(10);
    
            return view('admin/clients/edit', [
                'client' => $client,
                'user' => $user,
                'all_clients' => $all_clients
            ]);
            
        }

    }

    public function update(Client $client) 
    {

        if( $this->authorize('is-admin') ) {

            $client->update(request()->validate([
                'number' => ['required', 'unique:clients,number,' . $client->id],
                'name' => ['required', 'unique:clients,name,' . $client->id],
                'description' => '',
                'active' => ''
            ]));
    
            return redirect('admin/clients/' . $client->id);
            
        }

    }

    public function store()
    {
        
        if( $this->authorize('is-admin') ) {

            Client::create(request()->validate([
                'number' => ['required', 'unique:clients,number'],
                'name' => ['required', 'unique:clients,name'],
                'description' => ''
            ]));
    
            return redirect('/admin/clients');
            
        }

    }

}
