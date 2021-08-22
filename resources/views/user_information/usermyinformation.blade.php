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
{{session('msg4')}}
                <!-- order list area start -->
                <div class="container">
                    <div class="row">
						<div class="row">
							<div class="header-title">My information</div>
							<table class="table table-image">
                                <thead>
									<tr>
										<td>User id</td>
										<td>Username</td>
										<td>Name</td>
										<td>Password</td>
										<td>Email</td>
										<td>Phone</td>
										<td>type</td>
										<td>Profile Picture</td>
									</tr>
								</thead>	
								@foreach ($myinformationlist as $info)
								<tbody>					
									<tr>
										<td>{{$info['userid']}}</td>
										<td>{{$info['username']}}</td>
										<td>{{$info['name']}}</td>
										<td>{{$info['password']}}</td>
										<td>{{$info['email']}}</td>
										<td>{{$info['phoneno']}}</td>
										<td>{{$info['type']}}</td>
										<td>
											<img src="{{asset('assets/users/'.$info['profilepic'])}}" width="100" height="100">
										</td>
										<td><a href="{{route('user.myinformationedit',$info['userid'])}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
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
