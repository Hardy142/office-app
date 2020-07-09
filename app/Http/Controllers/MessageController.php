<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Project;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store()
    {

        $project_id = request()->input('project_id');
        $user = User::find(request()->input('user_id'));
        
        Message::Create([
            'message' => request()->input('message'),
            'conversation_id' => request()->input('conversation_id'),
            'user_id' => $user->id
        ]);
        
        if( $user->role_id == 1 || $user->role_id == 2 ) {

            return redirect('/admin/projects/' . $project_id);

        }else {

            return redirect('/projects/' . $project_id);

        }

    }

    public function update(Message $message) {

        $project_id = request()->input('project_id');
        $user = User::find(request()->input('user_id'));
        
        $message->update([
            'been_viewed' => 1
        ]);

        if( $user->role_id == 1 || $user->role_id == 2 ) {

            return redirect('/admin/projects/' . $project_id);

        }else {

            return redirect('/projects/' . $project_id);

        }

    }
}
