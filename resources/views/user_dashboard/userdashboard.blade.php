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
							<div class="header-title">Content List</div>
							<table class="table table-image">
                                <thead>
									<tr>
										<td>Content Title</td>
										<td>Content Image</td>
										<td>Content Pdf</td>
										<td>Content Video</td>
										<td>Content Description</td>
									</tr>
								</thead>	
								@foreach ($list as $contentlist)
								<tbody>					
									<tr>
										<td><a href="{{ route('user.dashboarddetails',$contentlist['id'])}}">{{$contentlist['title']}}</a></td>
										<td>
											<img src="{{asset('assets/users/'.$contentlist['image'])}}" width="100" height="100"></td>
										<td>@if ($contentlist['pdf']== null)
											no pdf
											@else 
											PDF available
											@endif
										</span></td>
										<td>@if ($contentlist['video']== null)
											No video
											@else 
											VIDEO available
											@endif
										</span></td>
										<td>{{$contentlist['cdescription']}}</td>
									</tr>
									@endforeach
									
                                </tbody>
                            </table>
                        </div>
                    </div>
					  <div class="pagination_area pull-center mt-5">
                            <ul>
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                </div>
                <!-- order list area end -->
                
	@endsection


</html>
