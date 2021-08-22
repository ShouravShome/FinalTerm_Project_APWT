<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userwishlist extends Model
{
    protected $table = 'wishlist';
	protected $primaryKey = 'cid';
	public $timestamps = false;
	
	//const CREATED_AT = 'create_time';
	//const UPDATED_AT = 'update_time';
}
