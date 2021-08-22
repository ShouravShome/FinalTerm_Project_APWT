<?php

namespace App\Http\Controllers;
use App\loguser;
use App\admincontent;
use App\noticestatus;
use App\adminorderstatus;
use Illuminate\Http\Request;
use Validator;
use App\User;

use Illuminate\Support\Facades\Hash;


class registercontroller extends Controller
{
    
    public function register(Request $req){
        return view ('login.register');
       // $Loguser= new loguser ;
       // $Loguser->username=$req->input('username');
       // $Loguser->name=$req->input('name');
       // $Loguser->password=Hash::make($req->input('password'));
       // $Loguser->email=$req->input('email');
       // $Loguser->phoneno=$req->input('phoneno');
       // $Loguser->type=$req->input('type');
       // $Loguser->save();

        //return   $Loguser;

        
    }

    public function store(Request $request)
    {

        $validation = Validator:: make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required|min:4|max:10',
            'email' => 'required',
            'phoneno' => 'required',
            'type' => 'required'

           
            
            
        ]);
        if ($validation->fails()){
            return redirect()->route('login.register')->with('errors',$validation->errors());
        }
        
        
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
            return view('index.adminshow')-> with('Loguser',$Loguser);
        }

        
        public function display11()
        {
            $Loguser = loguser::all();
            return view('index.managershow')-> with('Loguser',$Loguser);
        }

        public function display33()
        {
            $Loguser = loguser::all();
            return view('index.creatorshow')-> with('Loguser',$Loguser);
        }
        
        
        public function display22()
        {
            $Adminorder = adminorderstatus::all();
            return view('index.orderstatusshow')-> with('Adminorder',$Adminorder);
        }

        public function edit($userid)
        {
            $Loguser = loguser::find($userid);
            return view('index.edituser')-> with('Loguser',$Loguser);
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

            
    
           $Loguser-> save();
           return redirect()->back()->with('status', ' Added Successfully');

        }

        public function delete($userid)
        {
            $Loguser = loguser::find($userid);
            $Loguser -> delete();
            return redirect('index')->with('status','Image Deleted Successfully');
            

        }
        public function delete11($userid)
        {
            $Loguser = loguser::find($userid);
            $Loguser -> delete();
            return redirect('managershow')->with('status','Image Deleted Successfully');

        }

        public function delete22($userid)
        {
            $Loguser = loguser::find($userid);
            $Loguser -> delete();
            return redirect('creatorshow')->with('status','Image Deleted Successfully');

        }



        public function displays()
        {
            $Loguser = admincontent::all();
            return view('index.contentshow')-> with('Loguser',$Loguser);
        }
        public function forgotpass(){
            return view ('login.adminforgotpass');


        }


    public function store11(Request $request)
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
		return redirect('/')->with('status', ' Successfull ');
		
    }

    public function managerstatus(){
        return view ('index.addmanager');


    }

        //  public function view($id)
        // {
        //     $Creatorimages = admincontent::find($id);
        //     return view('index.showimagefile', compact('Creatorimages'));
            
        // }

       

        public function displays33()
        {
            $showorder = orderstatus::all();
            return view('index.ordershow')-> with('showorder',$showorder);
        }

        public function displays44()
        {
            $showorder = noticestatus::all();
            return view('index.ordershow')-> with('showorder',$showorder);
        }
        
        public function noticestatus(){
            return view ('index.noticeshow');
    
    
        }

		
    
        public function createuser(Request $request)
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
           return redirect()->back()->with('status', ' Added Successfully');

        }

        public function noticeshow(Request $request)
        {
            $Noticestatus = new noticestatus();

        $Noticestatus->topic = $request -> input('topic');
        $Noticestatus->ndescription = $request -> input('ndescription');
		
    
		$Noticestatus-> save();
           return redirect()->back()->with('status', '  Successfull');

        }

        public function displays55()
        {
            $Noticestatus = noticestatus::all();
            return view('index.noticeboard')-> with('Noticestatus',$Noticestatus);
        }


        public function deletenotice($id)
        {
            $Loguser = noticestatus::find($id);
            $Loguser -> delete();
            return redirect('allnotice')->with('status',' Deleted Successfully');

        }
        public function index(){
            $users = loguser::orderBy('userid','desc')->get();
            return response()->json($users);

        }

        public function show()
    {
        $users = loguser::all();
        return response()->json($users);
    }
    
    public function login(Request $req){
        
        $users= loguser:: where('email',$req->email)->first();

        return response()->json($users);

    }
    public function storeapi(Request $req)
    {

        $users= new loguser;
        $users->username = $request->username;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phoneno = $request->phoneno; 
        $users->type = $request->type;
        $users->save();0
        return response()->json($users);


    }
	 public function destroy($userid)
    {
        $users = loguser::findOrFail($userid);
        $users->delete();
        return response()->json($users);
    }
	public function stored (Request $request)
    {
        $users = new loguser;
        $users->username = $request->username;
        $users->name = $request->name;
        $users->email = $request->email;
		$users->phoneno = $request->phoneno;
		$users->type = $request->type;
        $users->save();
        return response()->json($request);
    }
	
	public function updated (Request $request, $userid)
    {
        $users = loguser::findOrFail($userid);
        $users->username = $request->username;
        $users->name = $request->name;
        $users->email = $request->email;
		$users->phoneno = $request->phoneno;
		$users->type = $request->type;
        return response()->json($request);
    }
    
        
}
