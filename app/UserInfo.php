<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;

class UserInfo extends Model
{
    public function User()
    {
        return $this->hasOne('App\User');
    }
}
