<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'path', 'project_id', 'type'];

    public function get_project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
