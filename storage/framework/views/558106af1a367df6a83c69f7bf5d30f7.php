             <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo e(asset('public/backend/images/users/avatar-1.jpg')); ?>" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?php echo e(Auth::user()->name); ?> <i class="mdi mdi-chevron-down"></i> 
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
                            <a class="dropdown-item notify-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </a>

                        </div>
                    </li>
                </ul>

                <!-- LOGO -->

                <div class="logo-box">
                    <a href="<?php echo e(URL('admin/dashboard')); ?>" class="logo text-center">
                        <span class="logo-lg">
                            <img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->logo)); ?>" alt=""  class="bg-white w-25">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>" alt="" class="bg-white w-25">
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
                                <a href="<?php echo e(route('dashboard')); ?>">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-briefcase"></i>
                                    <span> Cases </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.cases.add')); ?>">Add Case</a></li>
                                  <li><a href="<?php echo e(route('admin.cases')); ?>"> All Cases</a></li>
                                <li><a href="<?php echo e(url('admin/cases/list/current')); ?>"> Current Cases</a></li>
                                <li><a href="<?php echo e(url('admin/cases/list/success')); ?>">Success Cases</a></li>
                                </ul>
                            </li>
                            
                          
                            <li>
                                <a href="<?php echo e(route('admin.membership')); ?>">
                                    <i class="fe-users"></i>
                                    <span> Membership</span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-users"></i>
                                    <span> Users </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo e(route('admin.users')); ?>"> All  Users</a></li>
                                <li><a href="<?php echo e(url('admin/users-list/active')); ?>"> Active Users</a></li>
                                <li><a href="<?php echo e(url('admin/users-list/inactive')); ?>">Inactive Users</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="<?php echo e(route('admin.users.card')); ?>">
                                    <i class="fa fa-id-card"></i>
                                    <span> ID Card  </span>
                                </a>
                            </li>
                            
                            
                         
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-trophy"></i>
                                    <span> Certificate </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo e(url('admin/users-card/certificate')); ?>"> Generate Certificate </a></li>
                                <li><a href="<?php echo e(url('admin/certificate')); ?>">Certificate  List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>  Slider </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                   <li><a href="<?php echo e(route('admin.slider.add')); ?>">Add slider</a></li>
                                    <li><a href="<?php echo e(route('admin.slider')); ?>">All slider</a></li>
                                    <li><a href="<?php echo e(url('admin/slider/list/inactive')); ?>">Inactive slider</a></li>
                                    <li><a href="<?php echo e(url('admin/slider/list/active')); ?>">Active slider</a></li>
                                </ul>
                            </li>

                           
                          

                         
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-image"></i>
                                    <span> Gallery </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.album')); ?>"> Album</a></li>
                                    <!--<li><a href="<?php echo e(route('admin.gallery.add')); ?>">Add gallery</a></li>-->
                                
                                    <li><a href="<?php echo e(url('admin/gallery/list/image')); ?>">Image Gallery</a></li>
                                    <li><a href="<?php echo e(route('admin.videos')); ?>">Video Gallery</a></li>
                                    <li><a href="<?php echo e(url('admin/gallery/list/press')); ?>">News Gallery </a></li>
                                    <li><a href="<?php echo e(route('admin.partner')); ?>">Partner </a></li>
                                </ul>
                            </li>
                              <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-calendar"></i>
                                    <span> Events </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                     <li><a href="<?php echo e(route('admin.event.add')); ?>">Add Events</a></li>
                                    <li><a href="<?php echo e(route('admin.event')); ?>">All Events</a></li>
                                    <li><a href="<?php echo e(url('admin/event/list/inactive')); ?>">Inactive Events</a></li>
                                    <li><a href="<?php echo e(url('admin/event/list/active')); ?>">Active Events</a></li>
                                </ul>
                            </li>
                            
                              <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-tasks"></i>
                                    <span> Activity </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                     <li><a href="<?php echo e(route('admin.activity.add')); ?>">Add activity</a></li>
                                    <li><a href="<?php echo e(route('admin.activity')); ?>">All activity</a></li>
                                    <li><a href="<?php echo e(url('admin/activity/list/inactive')); ?>">Inactive activity</a></li>
                                    <li><a href="<?php echo e(url('admin/activity/list/active')); ?>">Active activity</a></li>
                                </ul>
                            </li>
                            
                             <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-info-circle"></i>
                                    <span> Initiative </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                     <li><a href="<?php echo e(route('admin.initiative.add')); ?>">Add initiative</a></li>
                                    <li><a href="<?php echo e(route('admin.initiative')); ?>">All initiative</a></li>
                                    <li><a href="<?php echo e(url('admin/initiative/list/inactive')); ?>">Inactive initiative</a></li>
                                    <li><a href="<?php echo e(url('admin/initiative/list/active')); ?>">Active initiative</a></li>
                                </ul>
                            </li>
                            
                            
                            
                               <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-package"></i>
                                    <span> Awards </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.award.add')); ?>">Add Award</a></li>
                                    <li><a href="<?php echo e(route('admin.award')); ?>">All Awards</a></li>
                                    <li><a href="<?php echo e(url('admin/award/list/certificate')); ?>"> Certificates</a></li>
                                    <li><a href="<?php echo e(url('admin/award/list/achievement')); ?>"> Achievements</a></li>
                                </ul>
                            </li>
                            
                                <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-clipboard"></i>
                                    <span> Blogs </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.blogs.add')); ?>">Add Blogs</a></li>
                                    <li><a href="<?php echo e(route('admin.blogs')); ?>">All Blogs</a></li>
                                    <li><a href="<?php echo e(url('admin/blogs/list/inactive')); ?>">Inactive Blogs</a></li>
                                    <li><a href="<?php echo e(url('admin/blogs/list/active')); ?>">Active Blogs</a></li>
                                </ul>
                            </li>
                           
                             <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-phone"></i>
                                    <span>  Enquiry List </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                             <li>
                                <a href="<?php echo e(route('admin.contactus.list')); ?>">
                                   ContactUs  
                                </a>
                            </li>
                            
                             <li>
                                <a href="<?php echo e(url('admin/enquiry/joinus')); ?>">
                                   Join Us  
                                </a>
                            </li>
                            
                                </ul>
                            </li>
                            
                         
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-message-square"></i>
                                    <span> Management Team </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.team.add')); ?>">Add  Member</a></li>
                                    <li><a href="<?php echo e(route('admin.team')); ?>">All  Member</a></li>
                                    <li><a href="<?php echo e(url('admin/team/list/inactive')); ?>">Inactive  Member</a></li>
                                    <li><a href="<?php echo e(url('admin/team/list/active')); ?>">Active  Member</a></li>
                                </ul>
                            </li>

                                <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-message-square"></i>
                                    <span> Testimonials </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.testimonials.add')); ?>">Add  </a></li>
                                    <li><a href="<?php echo e(route('admin.testimonials')); ?>">All testimonials</a></li>
                                    <li><a href="<?php echo e(url('admin/testimonials/list/inactive')); ?>">Inactive testimonials</a></li>
                                    <li><a href="<?php echo e(url('admin/testimonials/list/active')); ?>">Active testimonials</a></li>
                                </ul>
                            </li>
                        
                        
                         
                            
                             <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-message-square"></i>
                                    <span> Career  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.job.add')); ?>">Add  Job</a></li>
                                    <li><a href="<?php echo e(route('admin.job')); ?>">All  Jobs</a></li>
                                    <li><a href="<?php echo e(url('admin/job/list/inactive')); ?>">Inactive  Jobs</a></li>
                                    <li><a href="<?php echo e(url('admin/job/list/active')); ?>">Active  Jobs</a></li>
                                    
                                    <li><a href="<?php echo e(route('admin.applicant')); ?>">Applicants  List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-file-plus"></i>
                                    <span> Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    
                                    <li>
                                        <a href="<?php echo e(url('admin/page/home')); ?>">
                                           Home
                                        </a>
                                    </li>
                                    
                                    <li><a href="<?php echo e(url('admin/page/about')); ?>">About Us</a></li>
                                    
                                    <li><a href="<?php echo e(url('admin/page/president')); ?>">President Message</a></li>
                                   
                                     <li><a href="<?php echo e(url('admin/page/mission_vission')); ?>">Mission Vission</a></li>
                                     <li><a href="<?php echo e(url('admin/page/how_to_help_us')); ?>">How to Help  Us</a></li>
                                    <li><a href="<?php echo e(url('admin/page/list/news-updates')); ?>">News & Updates</a></li>
                                    
                                    
                                    <!--<li><a href="<?php echo e(url('admin/page/edit-card/appointment-letter')); ?>">Appointment Letter</a></li>-->
                                    <!--<li><a href="<?php echo e(url('admin/page/edit-card/id-card')); ?>">ID Card</a></li>-->
                                    <!--<li><a href="<?php echo e(url('page/list/whyChooseUs')); ?>">Why Choose Us</a></li>-->
                                    <li><a href="<?php echo e(url('admin/page/privacy')); ?>">Privacy Policy</a></li>
                                   
                                  
                                    
                                    
                                    <!--<li><a href="#">Contact Us</a></li>-->
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-settings"></i>
                                    <span> General Setting </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(route('admin.setting')); ?>">Frontend</a></li>
                                   
                                   
                                    <li><a href="<?php echo e(route('admin.donate.setting')); ?>">Donate</a></li>
                                    
                                    <li><a href="<?php echo e(route('back.setting.payment')); ?>">Payment</a></li>
                                    
                                      <li><a href="<?php echo e(route('admin.seo')); ?>">Site SEO</a></li>
                                  
                                    
                                    
                                </ul>
                            </li>
                        
                            <li>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
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
<?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/partials/navbar_admin.blade.php ENDPATH**/ ?>