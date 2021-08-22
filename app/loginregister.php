<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginregister extends Model
{
    protected $table = 'users';
    protected $primarykey = 'userid';
    Public $timestamps = false;
}
