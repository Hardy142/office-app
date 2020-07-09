<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function index($id)
    {   

        if( $this->authorize('is-logged-in') ) {

            $user = User::findOrFail($id);

            return view('/settings', ['user' => $user]);

        }

    }

    public function fileUpload(Request $request)
    {
    
        if( $this->authorize('is-logged-in') ) {

            $user = Auth::user();

            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/users/' . date("Y/m/d")),$imageName);
            $path = '/uploads/users/' . date("Y/m/d") . '/' . $imageName;

            $userSettings = UserSettings::where('user_id', $user->id)->first();

            $userSettings->update([
                'avatar' => $path
            ]);

        }
        
    }

    public function update($id)
    {

        if( $this->authorize('is-logged-in') ) {

            $settings = UserSettings::where('user_id', '=', $id);

            $settings->update([
                'first_name' => request('first_name'),
                'last_name' => request('last_name')
            ]);

            return redirect('/settings/' . $id);

        }

    }
}
