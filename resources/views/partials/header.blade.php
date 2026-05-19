<!-- HEADER -->
<div class="header header-3">
	 
    	<!-- TOPBAR -->
    	<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-6">
						<div class="info">
							<div class="info-item topbarSocial">
								<span class="fa fa-envelope-o"></span> <a href="mailto:{{generalSetting()->email}}" class="text-white" title=""><strong>Mail:</strong> {{generalSetting()->email}}
								</a>
							</div>
							<div class="info-item">
								<span class="fa fa-phone"></span>
								<a href="mailto:{{generalSetting()->phone}}" class="text-white" title="">
								<strong>Call Us:</strong> {{generalSetting()->phone}}
							   </a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-6">
						<div class="sosmed-icon pull-right topbarSocial">
							<a href="{{generalSetting()->fb}}"><i class="fa fa-facebook"></i></a> 
							<a href="{{generalSetting()->twitter}}"><i class="fa fa-twitter"></i></a> 
							<a href="{{generalSetting()->instagram}}"><i class="fa fa-instagram"></i></a> 
							<a href="{{generalSetting()->youtube}}"><i class="fa fa-youtube-play"></i></a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	 <!-- End TOPBAR -->
	 
		


        <!-------------- Main Header -------->
        <!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav class="navbar navbar-expand-lg">
			       	<a class="navbar-brand" href="{{route('home')}}">
                          <img src="{{asset('public/uploads/general/'.generalSetting()->logo)}}" alt="{{generalSetting()->site_name}} Logo"  class="imgLogo  img-responsive">
                	</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            
			            <ul class="navbar-nav">
                            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('home')}}">
                                HOME
                                </a>
                            </li>
			               
                            <li class="nav-item dropdown {{ in_array(request()->path(), ['about', 'pages/president', 'mission-vission']) ? 'active' : '' }}">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          ABOUT
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	<a class="dropdown-item" href="{{url('about')}}">About Us</a>
	          					
	          						<a class="dropdown-item" href="{{url('pages/president')}}">President Message</a>
	          						
	          						<a class="dropdown-item" href="{{route('mission_vission')}}">Mission & Vission</a>
	          						
	          						<a class="dropdown-item" href="{{route('team')}}">Management Team </a>
	          						<a class="dropdown-item" href="{{route('award',['type'=>'certificate'])}}">Certificates </a>
	          						<a class="dropdown-item"   href="{{route('award',['type'=>'achievement'])}}">Award & Achievement</a>
	          					
							    </div>
			                </li>
			                
			                   <li class="nav-item dropdown {{ (request()->is('case/current')) ? 'active' : '' }} {{ (request()->is('case/success')) ? 'active' : '' }} {{ request()->segment(1) == 'case-detail' && request()->segment(2) ? 'active' : '' }}">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            MEDICAL CASES
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    		<a class="dropdown-item" href="{{url('case/current')}}">Current Cases</a>
	          						<a class="dropdown-item" href="{{url('case/success')}}">Success  Cases</a>
	          					
							    </div>
			                </li> 
                            
                      
                              <li class="nav-item  {{ (request()->is('initiative')) ? 'active' : '' }} {{ request()->segment(1) == 'initiative-detail' && request()->segment(2) ? 'active' : '' }}">
                                <a class="nav-link"   href="{{route('initiative')}}">
                                    INITIATIVE
                                </a>
                            </li>  
                         
                            
			                 
      
                                       
                                    
                            
                           <li class="nav-item  {{ (request()->is('activity')) ? 'active' : '' }} {{ request()->segment(1) == 'activity-detail' && request()->segment(2) ? 'active' : '' }}">
                                <a class="nav-link"   href="{{route('activity')}}">
                                 LATEST    ACTIVITY
                                </a>
                            </li> 
                           
			               
                            <li class="nav-item dropdown {{ (request()->is('event/upcoming')) ? 'active' : '' }} {{ (request()->is('event/recent')) ? 'active' : '' }} {{ request()->segment(1) == 'event-detail' && request()->segment(2) ? 'active' : '' }}">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            EVENTS
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    		<a class="dropdown-item" href="{{url('event/upcoming')}}">Upcoming Events</a>
	          						<a class="dropdown-item" href="{{url('event/recent')}}">Recent Events</a>
	          					
							    </div>
			                </li>     
                            
                            
                            <li class="nav-item dropdown {{ (request()->is('gallery')) ? 'active' : '' }} {{ (request()->is('video')) ? 'active' : '' }} ">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						           GALLERY
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	
	          						<a class="dropdown-item" href="{{route('gallery')}}">Photo Gallery</a>
	          						<a class="dropdown-item" href="{{route('video')}}">Video Gallery </a>
							    </div>
			                </li> 
			                
                            <li class="nav-item  {{ (request()->is('press-release')) ? 'active' : '' }}">
                                <a class="nav-link"   href="{{route('press')}}">
                                    NEWS 
                                </a>
                            </li> 
	                     
	                        
			                
      		                  <li class="nav-item  {{ (request()->is('our-blogs')) ? 'active' : '' }} {{ request()->segment(1) == 'our-blogs' && request()->segment(2) ? 'active' : '' }}">
                                <a class="nav-link"   href="{{route('blogs')}}">
                                    BLOG </a>
                                </a>
                            </li>
                        
			                
	                                  
                            <!--<li class="nav-item  {{ (request()->is('job-listing')) ? 'active' : '' }}">-->
                            <!--    <a class="nav-link"   href="{{url('job-listing')}}">-->
                            <!--        CAREER</a>-->
                            <!--    </a>-->
                            <!--</li>  -->
                            
                             
                            
                             <li class="nav-item  {{ (request()->is('contact-us')) ? 'active' : '' }}">
                                <a class="nav-link"   href="{{route('contactus')}}">
                                    CONTACT </a>
                                </a>
                            </li>
                            
			            </ul>
			          {{---------------
			            <a href="#" class="btn-primary btn-sm">DONATE NOW</a>
			            ---------------}}
			        </div>
			    </nav>
			</div>
		</div>


    </div>
 
