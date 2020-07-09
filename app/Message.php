<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['message', 'conversation_id', 'user_id', 'been_viewed'];

    public function get_conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
