<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{   

    protected $fillable = ['name', 'number', 'description', 'client_id', 'user_assigned', 'due_date', 'user_created', 'completed_at'];

    protected $dates = ['completed_at'];

    public function client() 
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function created_by() 
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    public function assigned_user() 
    {
        return $this->belongsTo(User::class, 'user_assigned');
    }

    public function get_files()
    {
        return $this->hasMany(File::class, 'project_id');
    }

    public function get_conversation()
    {
        return $this->hasOne(Conversation::class);
    }
}