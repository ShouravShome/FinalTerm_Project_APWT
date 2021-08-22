<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class managercontroller extends Controller
{
    public function verify(Request $req){
		
        $validation = Validator:: make($req->all(), [
      'username' => 'required',
      'name' => 'required',
      'password' => 'required|min:4|max:10',
      'email' => 'required',
      'phoneno' => 'required',
      'type' => 'required',
       'profilepic' => 'required'
  ]);

  if ($validation->fails()){
     // return redirect()->route('index.addmanager')->with('errors',$validation->errors());

     return redirect()->back()
           ->withInput()
           ->withErrors($validation);
  }
  
}

}