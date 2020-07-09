<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $fillable = ['user_id', 'avatar', 'first_name', 'last_name'];

    public function owned_user()
    {

        return $this->hasOne(User::class);

    }
}
