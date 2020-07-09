<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( $this->authorize('is-admin') ) {
         
            $user = Auth::user();

            $employees = User::orderBy('name')
                            ->where([
                                ['role_id', '!=', '1'],
                                ['active', '=', 1]
                            ])->paginate(10);
    
            return view('admin/users/index', [
                'employees' => $employees,
                'user' => $user
            ]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if( $this->authorize('is-admin') ) {
         
            $user = Auth::user();

            $employees = User::orderBy('name')
                            ->where([
                                ['role_id', '!=', '1'],
                                ['active', '=', 1]
                            ])->paginate(10);
    
            return view('admin/users/create', [
                'user' => $user,
                'employees' => $employees
            ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if( $this->authorize('is-admin') ) {
         
            $user = Auth::user();

            $employee = User::findOrFail($id);
    
            $employees = User::orderBy('name')
                            ->where([
                                ['role_id', '!=', '1'],
                                ['active', '=', 1]
                            ])->paginate(10);
    
            return view('admin/users/show', [
                'employee' => $employee,
                'user' => $user,
                'employees' => $employees
            ]);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   

        if( $this->authorize('is-admin') ) {
         
            if( $user->active == 1 ) {

                $user->active = 0;

            }else {

                $user->active = 1;

            }

            $user->save();
    
            return redirect('/admin/users/' . $user->id);

        }

    }

}
