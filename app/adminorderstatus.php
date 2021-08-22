<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminorderstatus extends Model
{
    protected $table = 'orders';
    protected $primarykey = 'orderid';
    Public $timestamps = false;
}
