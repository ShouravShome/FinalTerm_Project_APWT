<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usercontent;
use App\userinvoice;
use App\userwishlist;

class userdashboardcontroller extends Controller
{
    public function index(Request $req){
		//$name=$req->session()->get('username');
		//$pic=$req->session()->get('picname');
		$content= usercontent::all();

		//return view('user_dashboard.userdashboard')->with('list', $content);
		//return view('user_dashboard.userdashboard', compact('pic','name'))->with('list', $content);
		return response()->json($content);
	}
	public function details(Request $req, $id){
		$content= usercontent::where('id', $id)
		                             ->get();
									 //dd($content);
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_dashboard.userdashboarddetails', compact('pic','name'))->with('list', $content);
	}
	public function invoice(Request $req, $id){
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		$invoice= usercontent::where('id', $id)
		                             ->first();
		$updatecstatus= usercontent::where('cstatus','=',1)
									->update(['cstatus'=> 0]);
									
		$new_invoice=new userinvoice;
		$new_invoice->invoiceid = $invoice['id'];
		$new_invoice->invoicetitle = $invoice['title'];
		$new_invoice->invoiceprice = $invoice['cprice'];
		$new_invoice->invoicestatus = $invoice['cstatus'];
		$new_invoice->save();	
			
		$invoice1= usercontent::where('id', $id)
		                       ->get();						
		return view('user_dashboard.userdashboardinvoice', compact('pic','name'))->with('invoicelist', $invoice1);
	}
	public function print($id){
		$print= usercontent::where('id', $id)
		                       ->get();
		return view('user_dashboard.userdashboardprint')->with('printlist', $print);
	}
	public function wishlist(Request $req, $id){
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		$invoice2= usercontent::where('id', $id)
		                             ->first();
		$updatewstatus= usercontent::find($id);
		$updatewstatus->wstatus = 1;
		$updatewstatus->save();
									
		$new_wishlist=new userwishlist;
		$new_wishlist->cid = $invoice2['id'];
		$new_wishlist->ctitle = $invoice2['title'];
		$new_wishlist->cprice = $invoice2['cprice'];
		$new_wishlist->cstatus = $invoice2['cstatus'];
		$new_wishlist->save();	
		$sum= userwishlist :: sum('cprice');	
		$invoice3= userwishlist::all();
		                       						
		return view('user_order.userorderwishlist', compact('pic','name','sum'))->with('wishlist', $invoice3);
	}
	public function edit(Request $req, $id){
		$editcontent= usercontent::find($id);
		$editcontent->crating=$req->star;
		$editcontent->ccomplain=$req->complain;
		$editcontent->save();
		//dd($editcontent);
		return redirect()->route('user.dashboard');
	}
}
