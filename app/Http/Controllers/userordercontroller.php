<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userorder;
use App\userwishlist;
use App\usercontent;
use App\Http\Requests\orderrequest;
use Illuminate\Support\Facades\Storage;

class userordercontroller extends Controller
{
    public function index(Request $req){
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_order.userorder', compact('pic','name'));
	}
    public function add(Request  $req){
		//$username=$req->session()->get('username');
		//$lastid= userorder::orderBy('orderid', 'desc')
			//				->first();
							//dd($lastid);
		$new_order=new userorder;
		$new_order->ordername = $req->ordername;
		$new_order->orderdescription = $req->orderdescription;
		$filepath = $req->file('file')->store('public');
		$new_order->picture = $filepath;
		//$new_order->orderstatus = 0;
		/*if($req->hasfile('picture')){
				$file1 = $req->file('picture');
				$filename= $file1->getClientOriginalName();
				$finalName=date('His') . $filename;
				$req-> file('picture')->storeAs('pictures/', $finalName, 'public');
				//if($file1->move('assets/users', $lastid['orderid']+'1'.'.'.$file1->getClientOriginalExtension()))
					//	 $new_order->template = $lastid['orderid']+'1'.'.'.$file1->getClientOriginalExtension();
				$new_order->template = $finalname;
		}
					//echo "success";
		//}
		//if($req->hasfile('pic')){
			//	$file = $req->file('pic');
				//if($file->move('assets/users', $lastid['orderid']+'1'.'.'.$file->getClientOriginalExtension()))
					//		$new_order->picture = $lastid['orderid']+'1'.'.'.$file->getClientOriginalExtension();
					//echo "success";
		//}*/
		$new_order->save();
		return response()->json($new_order);
		//$req->session()->flash('msg', 'Order added');
		//return redirect('/user/order');
	}
	public function details(Request $req)
	{
		$order= userorder::all();
									 //dd($content);
		//$name=$req->session()->get('username');
		//$pic=$req->session()->get('picname');
		//return view('user_order.userorderdetails', compact('pic','name'))->with('orderlist', $order);
		return response()->json($order);
	}
	public function edit(Request $req, $id)
	{
		$edit= userorder::where('orderid',$id)
						->get();
						
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_order.userorderedit', compact('pic','name'))->with('editlist', $edit);
	}
	public function update(Request $req, $id){
		$edit= userorder::where('orderid',$id)
						->get();
		//$lastorderid= userorder::orderBy('orderid', 'desc')
			//				->first();
		//$username=$req->session()->get('username');
		$editorder= userorder::find($id);
		$editorder->ordername = $req->ordername;
		$editorder->orderdescription = $req->orderdescription;
		//if($req->hasfile('temp')){
			//	$file1 = $req->file('temp');
				//if($file1->move('assets/users', $lastorderid['orderid'].'.'.$file1->getClientOriginalExtension()))
					//		$editorder->template = $lastorderid['orderid'].'.'.$file1->getClientOriginalExtension();
					//echo "success";
		//}
		//if($req->hasfile('pic')){
			//	$file = $req->file('pic');
				//if($file->move('assets/users', $lastorderid['orderid'].'.'.$file->getClientOriginalExtension()))
					//		$editorder->picture = $lastorderid['orderid'].'.'.$file->getClientOriginalExtension();
					//echo "success";
		//}
		$editorder->save();
		//$req->session()->flash('msg2', 'Updated');
		//return redirect()->route('user.orderdetails');
		return response()->json($editorder);
	}
	public function Del(Request $req, $id){
		$del= userorder::where('orderid',$id)
						->get();
						
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_order.userorderdelete', compact('pic','name'))->with('dellist', $del);
	}
	public function des(Request $req, $id){
		$del= userorder::where('orderid',$id)
						->get();
		$des= userorder::destroy($id);
		//$req->session()->flash('msg1', 'Deleted');
		//return redirect()->route('user.orderdetails');
		$order= userorder::all();
		return response()->json($order);
	}
	public function check(Request $req){
		$check1= userorder::all();
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		//dd($check);
		return view('user_order.userordercheck', compact('pic','name'))->with('checklist', $check1);
	}
	public function wishlist(Request $req){
		$wish= userwishlist::all();
		$sum= userwishlist :: sum('cprice');
		//dd($sum);
		$name=$req->session()->get('username');
		$pic=$req->session()->get('picname');
		return view('user_order.userorderwishlist', compact('pic','name','sum'))->with('wishlist', $wish);
	}
	public function wishlistdelete(Request $req){
		$wishdelete= userwishlist::truncate();
		//$name=$req->session()->get('username');
		//$pic=$req->session()->get('picname');
		$updatewstatus= usercontent::where('wstatus', '=', 1)
									->update(['wstatus' => 0]);
		//$updatewstatus->wstatus = 0;
		//$updatewstatus->save();
		return redirect()->route('user.orderwishlist');
	}
}
