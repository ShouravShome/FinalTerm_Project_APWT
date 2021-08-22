<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loguser;
use DB;

class AdminController extends Controller
{
    public function index(Request $req){
       if ($req->session()->has('email')){
              return view('index.index');
              
        
    } else {
            $req->session()->flash('msg', 'invalid request');
            return redirect('/login');

        }
        //return view ('index.index');
    }

    public function search(Request $request){
        if(empty($request->all())){
            $data=loguser::paginate(2);
            return view('#', compact('data'));
        }else{
        
        $data= DB::table ('users')->Where('username', 'LIKE', '%' .$request->search. '%')->orWhere('email', 'LIKE', '%' .$request->search. '%' )->paginate(2);
        return view('index.searchresult', compact('data'));
        }
    }
   
    public function creatordashboard(){
        return view ('index.creatordash');
    }
   
    public function managerdashboard(){
        return view ('index.managerdash');
    }
   

    public function orderstatusdashboard(){
        return view ('index.orderstatus');
    }
   

   
}

