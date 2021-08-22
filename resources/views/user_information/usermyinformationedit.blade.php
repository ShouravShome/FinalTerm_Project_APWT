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
							<div class="header-title">My information</div>
							<table class="table table-image">
								<form method="post" enctype="multipart/form-data">
								@csrf
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
								@foreach ($editlist as $info)
								<tbody>					
									<tr>
										<td>{{$info['userid']}}</td>
										<td>{{$info['username']}}</td>
										<td><input type="text" name="name" value="{{$info['name']}}"</td>
										<td><input type="text" name="password" value="{{$info['password']}}"</a></td>
										<td><input type="text" name="email" value="{{$info['email']}}"</td>
										<td><input type="text" name="phoneno" value="{{$info['phoneno']}}"</td>
										<td><input type="text" name="type" value="{{$info['type']}}"</td>
										<td>
											<img src="{{asset('assets/users/'.$info['profilepic'])}}" width="100" height="100">
											 <input type="file" multiple accept="image/*" name="picture">
										</td>
										
									</tr>
									@endforeach
									<td><button class="btn btn-outline-secondary" type="submit">Update</button></td>
                                </tbody>
								</form>
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
