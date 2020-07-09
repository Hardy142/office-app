<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'last_logged_in', 'active'
    ];

    protected $dates = ['last_logged_in'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activeAssignedProjects() 
    {
        return $this->hasMany(Project::class, 'user_assigned')->whereNull('completed_at');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function settings()
    {
        return $this->hasOne(UserSettings::class, 'user_id');
    }

    public function get_messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

}
