<!doctype html>
@extends('user_layout.print')
@extends('../user_layout/usermaster')
@extends('../user_layout/usersidebar')
@extends('../user_layout/userheader')
@extends('../user_layout/userfooter')
@section('indexcontent')
<html>
<head>
<title>User Dashboard</title>
<div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>Wishlist</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>Wishlist By</h3>
                                                <h5>{{$name}}</h5>
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                        
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                                        <table class="table table-bordered table-hover text-right">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th class="text-center" style="width: 5%;">id</th>
                                                    <th class="text-left" style="width: 45%; min-width: 130px;">Title</th>
                                                   
                                                    <th style="min-width: 100px">Cost</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											@foreach ($wishlist as $wish)
                                                <tr>
                                                    <td class="text-center">{{$wish['cid']}}</td>
                                                    <td class="text-left">{{$wish['ctitle']}}</td>
                                                    <td>{{$wish['cprice']}}</td>
                                                   
                                                   
                                                </tr>
											@endforeach
											<tr>
											<td></td>
											<td>Total Cost</td>
											<td>{{$sum}}</td>
											</tr>
                                                <td><a href="{{route('user.wishlistdelete')}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
												
                                            </tbody>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
		@endsection
		</html>