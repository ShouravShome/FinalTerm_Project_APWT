<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userrequest;
use App\userlogin;

class userlogincontroller extends Controller
{
    public function index(){
		return view('user_login.userlogin');
	}
	public function verify(userrequest $req){
		$login = userlogin::where('email', $req->email)
					    ->where('password', $req->password)
					    ->first();
		if(count((array)$login) > 0){
		$req->session()->put('username', $login['username']);
		$req->session()->put('picname', $login['profilepic']);
		$req->session()->put('type', $login['type']);
		return redirect ('/user/dashboard');
		}
		else
			$req->session()->flash('msginvalid', 'Email or password not matched');
			return redirect('/login');
	}
}
