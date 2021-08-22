<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordershow extends Model
{
    protected $table = 'orders';
	protected $primaryKey = 'orderid';
	public $timestamps = false;
}
