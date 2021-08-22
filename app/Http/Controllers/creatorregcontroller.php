<?php

namespace App\Http\Controllers;
use App\loguser;
use Illuminate\Http\Request;

class creatorregcontroller extends Controller
{
    
    public function register(){
        return view ('login.register');
    }

    public function store55(Request $request)
    {
        
        $Loguser = new loguser();

        $Loguser->username = $request -> input('username');
        $Loguser->name = $request -> input('name');
		$Loguser->password = $request -> input('password');
		$Loguser->email = $request -> input('email');
		$Loguser->phoneno = $request -> input('phoneno');
		$Loguser->type = $request -> input('type');
		
        
        if($request->file ('profilepic')){

            $file=$request->file('profilepic');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->file->move ('public\assets'.$filename);
            $file->move(public_path('storage/'), $filename);

            $Loguser->profilepic=$filename;

            // $Creatorimage->image = $request -> input('image');
        }
		$Loguser-> save();
		return redirect('/login')->with('status', ' Registration Successfull ');
		
    }

	 public function display()
        {
            $Loguser = loguser::all();
            return view('contentshow.editprofile')-> with('Loguser',$Loguser);
        }

        public function edit($id)
        {
            $Loguser = loguser::find($id);
        //    dd($Loguser);
            return view('contentshow.editprofileform')-> with('Loguser',$Loguser);
        }

        

        public function update(Request $req, $userid)
        {

            $Loguser=loguser::find($userid);
            $Loguser->username = $req->username;
            $Loguser->name = $req->name;
			$Loguser->email = $req->email;
			$Loguser->password = $req->password;
			$Loguser->phoneno = $req->phoneno;
			$Loguser->type = $req->type;

            // $Creatorimage->image = $request -> input('image');
    
           $Loguser-> save();
           return redirect()->back()->with('status', 'Image Added Successfully');

        }

        public function delete($userid)
        {
            $Loguser = loguser::find($userid);
            $Loguser -> delete();
            return redirect('index')->with('status','Image Deleted Successfully');
            

        }

        public function displays()
        {
            $Loguser = admincontent::all();
            return view('index.contentshow')-> with('Loguser',$Loguser);
        }

		
    
}
