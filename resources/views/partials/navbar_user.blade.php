            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('public/backend/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>


                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </a>

                        </div>
                    </li>
                </ul>

                <!-- LOGO -->

                <div class="logo-box">
                    <a href="{{ URL('admin/dashboard') }}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" alt=""  class="bg-white w-25">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('public/uploads/general/'.generalSetting()->favicon)}}" alt="" class="bg-white ">
                        </span>
                    </a>
                </div>                
                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>


                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">
                             
                            <li>
                                <a href="{{route('user.dashboard')}}">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>
                            <li>
                                <a href="{{url('/')}}">
                                    <i class="fe-home"></i>
                                    <span> Visit Site </span>
                                </a>
                                
                            </li>
                           
                            <li>
                                <a href="{{route('user.membership')}}">
                                    <i class="fa fa-user-edit"></i>
                                    <span> For  Membership</span>
                                </a>
                            </li>
                          
                             <li>
                                <a href="{{route('user.membership')}}">
                                    <i class="fa fa-user-plus"></i>
                                    <span>  Membership Status  </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('user.id_card')}}">
                                    <i class="fa fa-id-card"></i>
                                    <span>  Generate Id Card </span>
                                </a>
                            </li>

                             <li>
                                <a href="{{route('user.appointment')}}">
                                    <i class="fa fa-envelope "></i>
                                    <span>  Appointment Letter </span>
                                </a>
                            </li>

                             <li>
                                <a href="{{route('user.certificate')}}">
                                    <i class="fa fa-trophy "></i>
                                    <span>  Certificate </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('donate')}}" target="_blank">
                                    <i class="fe-dollar-sign"></i>
                                    <span> Donate Now </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-file"></i>
                                    <span> Donation Receipt </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#">Online </a></li>
                                    <li><a href="#">Offline</a></li>
                                    
                                </ul>
                            </li>
                            

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-user"></i>
                                    <span> Profile</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('user.edit_profile')}}">Edit Profile </a></li>
                                    <li><a href="{{route('user.profile')}}">View Profile</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                </a>
                            </li> 
                
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
