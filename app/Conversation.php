<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['project_id'];

    public function get_project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function get_messages()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }

    public function unread_messages()
    {
        return $this->hasMany(Message::class, 'conversation_id')->where('been_viewed', '=', false);
    }
}
