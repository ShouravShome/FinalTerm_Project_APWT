@section('sidebar')
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
         
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{route('user.dashboard')}}">Content dashboard</a></li>
                                    <li><a href="{{route('user.order')}}">Order dashborad</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>My orders
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('user.orderdetails')}}">Order List</a></li>            
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Information</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('user.information')}}">User Information</a></li>
                                    <li><a href="{{route('user.myinformation')}}">My information</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Order Status</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('user.ordercheck')}}">Check</a></li>
                                    <li><a href="{{route('user.orderwishlist')}}">Wishlist</a></li>
                                </ul>
                            </li>
                  
                           
                            
                          
                   
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
		@endsection