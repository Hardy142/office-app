<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    protected $fillable = ['name', 'number', 'description', 'active'];

    public function projects_active() 
    {
        return $this->hasMany(Project::class)->whereNull('completed_at');
    }
    public function projects() 
    {
        return $this->hasMany(Project::class, 'client_id');
    }

}
