<?php

namespace App\Http\Controllers;

use App\loguser;
use Illuminate\Http\Request;
use Validator;


class LoginController extends Controller
{
    public function login(){
		return view('login.login');
	}
	

	public function verify(Request $req){
		
		  $validation = Validator:: make($req->all(), [
		'email' => 'required',
		'password' => 'required|min:4|max:10'
	]);
	if ($validation->fails()){
		return redirect()->route('login.login')->with('errors',$validation->errors());
	}
	
	$login = loguser::where('email', $req->email)
					    ->where('password', $req->password)
					    ->first(); 

		if(count((array)$login) > 0){
		$req->session()->put('email', $req->email);
		//$req->session()->put('password', $req->password);
		//$req->session()->put('type', $login['type']);
		return redirect ('/index');
		}else{

			$req->session()->flash('msg', 'invalid email or password');
			return redirect('/login');
	}

	
}
   

}