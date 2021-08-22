<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderstatus extends Model
{
    protected $table = 'orders';
    protected $primarykey = 'orderid';
    Public $timestamps = false;
}
