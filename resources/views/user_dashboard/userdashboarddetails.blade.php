<!doctype html>
@extends('../user_layout/usermaster')
@extends('../user_layout/userheader')
@extends('../user_layout/usersidebar')
@extends('../user_layout/usersearch')
@extends('../user_layout/userfooter')


<html class="no-js" lang="en">

<head>
        <title>User Dashboard</title>
</head>


@section('indexcontent')
                <!-- order list area start -->
                <div class="container">
                    <div class="row">
						<div class="row">
							<div class="header-title">Content Details</div>
							<form method="post">
											  @csrf
							<table class="table table-image">
                                <thead>
										
								@foreach ($list as $contentlist)
								<tbody>		
									<tr>
										<td>Content Id</td>
										<td>{{$contentlist['id']}}</td>
									</tr>
									<tr>
										<td>Content Title</td>
										<td>{{$contentlist['title']}}</td>
									</tr>
									<tr>
										<td>Content Image</td>
										<td class="w-25">
											<a href="{{asset('assets/users/'.$contentlist['image'])}}" ><img src="{{asset('assets/users/'.$contentlist['image'])}}"></a></td>
									</tr>	
									<tr>
										<td>Content PDF</td>
										<td>@if($contentlist['pdf']== null)
												No PDF
											@else
												@if ($contentlist['cstatus']== 1)
												Buy First
												@else 
												<a href="{{ asset('assets/users/'.$contentlist['pdf'])}}" target="_blank"><button type="button" class="btn btn-primary">Download</button></a>
												@endif
											@endif	
										</span></td>
									</tr>
									<tr>
										<td>Content Video</td>
										<td>@if($contentlist['video']== null)
												No VIDEO
											@else
												@if ($contentlist['cstatus']== 1)
												Buy First
												@else 
												<a href="{{ asset('assets/users/'.$contentlist['video'])}}" target="_blank"><button type="button" class="btn btn-primary">Download</button></a>
												@endif
											@endif
										</span></td>
									</tr>
									<tr>
										<td>Content Description</td>
										<td>{{$contentlist['cdescription']}}</td>
									</tr>
									<tr>
										<td>Content Rating</td>
										<td>{{$contentlist['crating']}}.Star</td>
										<td>
										<div class="stars">
											  
												<input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
												<label class="star star-5" for="star-5"></label>
												<input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
												<label class="star star-4" for="star-4"></label>
												<input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
												<label class="star star-3" for="star-3"></label>
												<input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
												<label class="star star-2" for="star-2"></label>
												<input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
												<label class="star star-1" for="star-1"></label>
											 
											</div>
										</td>
									<tr>
										<td>Content Review</td>
										<td>{{$contentlist['ccomplain']}}</td>
										<td><input type="text" id="fname" name="complain" size="50"></td>
										<td><button class="btn btn-outline-secondary" type="submit">Submit</button></td>
									</tr>									
									</tr>
									 </form>
									<tr>
										<td></td>
										<td>@if($contentlist['cstatus']== 1)
												<a href="{{route('user.dashboardinvoice',$contentlist['id'])}}"><button type="button" class="btn btn-primary">BUY</button></a>
											@else
												Free Content
											@endif
										</td>
										<td></td>
										<td>@if($contentlist['cstatus']== 1)
										@if($contentlist['wstatus']== 1)
												Already Added to wishlist
											@else
												<a href="{{route('user.dashboardinvoicewishlist',$contentlist['id'])}}"><button type="button" class="btn btn-primary">Add to wishlist</button></a>
											@endif
											@else
												Free Content
											@endif
												</td>
									</tr>
									@endforeach
									
                                </tbody>
								</thead>
                            </table>
                        </div>
	@endsection


</html>
