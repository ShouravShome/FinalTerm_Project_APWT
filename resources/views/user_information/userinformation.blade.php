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
							<div class="header-title">All User List</div>
							<table class="table table-image">
                                <thead>
									<tr>
										<td>Full name</td>
										<td>Type</td>
										<td>User Profilepic</td>
										<td>Contact Details</td>
									
									</tr>
								</thead>	
								@foreach ($informationlist as $info)
								<tbody>					
									<tr>
										<td>{{$info['name']}}</td>
										<td>{{$info['type']}}</td>
										<td>
											<img src="{{asset('assets/users/'.$info['profilepic'])}}" width="100" height="100">
										</td>
										<td>{!! QrCode::size(200)->generate('Phone no: '.$info['phoneno'].' Email: '.$info['email']); !!}</td>
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
