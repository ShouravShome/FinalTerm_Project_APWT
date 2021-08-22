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
          
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Progress Table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">task</th>
                                                  
                                              
                                                    <th scope="col">status</th>
                                                 
                                                </tr>
                                            </thead>
											@foreach ($checklist as $check)
                                            <tbody>
											
                                                <tr>
                                                    <th scope="row">{{$check['orderid']}}</th>
                                                    <td>{{$check['ordername']}}</td>
													
                                                    <td>@if($check['orderstatus']== 0)<span class="status-p bg-primary">pending</span>
                                                    
                                                        <ul class="d-flex justify-content-center">
                                                           
                                         
                                                        </ul>
                                                    
													@else
													<span class="status-p bg-success">accepted</span>
                                                    
                                                        <ul class="d-flex justify-content-center">
                                                           
                                                        </ul>
                                                    </td>	
													@endif
                                                </tr>
                                                
                                            </tbody>
											@endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
           @endsection


</html>
