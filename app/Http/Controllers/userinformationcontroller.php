<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userlogin;
use App\QrCode;

class userinformationcontroller extends Controller
{
	public function user(Request $req){

    $information= userlogin::all();
	
	//return view('user_information.userinformation', compact('pic','name'))->with('informationlist', $information);		
	return response()->json($information);
	}
	public function myuser(Request $req)
	{
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		$myinformation= userlogin::where('username',$name)
								->get();
								//dd($myinformation);
		return view('user_information.usermyinformation', compact('pic','name'))->with('myinformationlist', $myinformation);						
	}	
	public function edit(Request $req, $id)
	{
		$edit= userlogin::where('userid',$id)
						->get();
						
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_information.usermyinformationedit', compact('pic','name'))->with('editlist', $edit);
	}
	public function update(Request $req, $id){
		$username=$req->session()->get('username');
		$editinfo= userlogin::find($id);
		$editinfo->name = $req->name;
		$editinfo->password = $req->password;
		$editinfo->email = $req->email;
		$editinfo->phoneno = $req->phoneno;
		$editinfo->type = $req->type;
		if($req->hasfile('picture')){
				$file = $req->file('picture');
				if($file->move('assets/users', $req->username.'.'.$file->getClientOriginalExtension()))
							$editinfo->profilepic = $req->username.'.'.$file->getClientOriginalExtension();
					echo "success";
		}
		$editinfo->save();
		$req->session()->flash('msg4', 'User Updated');
		return redirect()->route('user.myinformation');
	}
	public function update1(Request $req, $id){
		$edit= userlogin::where('userid',$id)
						->get();
		$editinfo= userlogin::find($id);
		$editinfo->username = $req->username;
		$editinfo->name = $req->name;
		$editinfo->email = $req->email;
	
		$editinfo->save();
		return response()->json($editinfo);
	
	}
	public function add(Request $req){
		$editinfo = new userlogin;
		$editinfo->username = $req->username;
		$editinfo->name = $req->name;

		$editinfo->email = $req->email;
	


		$editinfo->save();
		return response()->json($editinfo);
		
	}
	public function des(Request $req, $id){
		$del= userlogin::where('userid',$id)
						->get();
		$dest= userlogin::destroy($id);
		//return redirect()->route('user.orderdetails');
		$user= userlogin::all();
		return response()->json($user);
	}
}
