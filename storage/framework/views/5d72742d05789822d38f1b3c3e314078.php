<!-- HEADER -->
<div class="header header-3">
	 
    	<!-- TOPBAR -->
    	<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-6">
						<div class="info">
							<div class="info-item topbarSocial">
								<span class="fa fa-envelope-o"></span> <a href="mailto:<?php echo e(generalSetting()->email); ?>" class="text-white" title=""><strong>Mail:</strong> <?php echo e(generalSetting()->email); ?>

								</a>
							</div>
							<div class="info-item">
								<span class="fa fa-phone"></span>
								<a href="mailto:<?php echo e(generalSetting()->phone); ?>" class="text-white" title="">
								<strong>Call Us:</strong> <?php echo e(generalSetting()->phone); ?>

							   </a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-6">
						<div class="sosmed-icon pull-right topbarSocial">
							<a href="<?php echo e(generalSetting()->fb); ?>"><i class="fa fa-facebook"></i></a> 
							<a href="<?php echo e(generalSetting()->twitter); ?>"><i class="fa fa-twitter"></i></a> 
							<a href="<?php echo e(generalSetting()->instagram); ?>"><i class="fa fa-instagram"></i></a> 
							<a href="<?php echo e(generalSetting()->youtube); ?>"><i class="fa fa-youtube-play"></i></a> 
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
			       	<a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                          <img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->logo)); ?>" alt="<?php echo e(generalSetting()->site_name); ?> Logo"  class="imgLogo  img-responsive">
                	</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            
			            <ul class="navbar-nav">
                            <li class="nav-item <?php echo e((request()->is('/')) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(route('home')); ?>">
                                HOME
                                </a>
                            </li>
			               
                            <li class="nav-item dropdown <?php echo e(in_array(request()->path(), ['about', 'pages/president', 'mission-vission']) ? 'active' : ''); ?>">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          ABOUT
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	<a class="dropdown-item" href="<?php echo e(url('about')); ?>">About Us</a>
	          					
	          						<a class="dropdown-item" href="<?php echo e(url('pages/president')); ?>">President Message</a>
	          						
	          						<a class="dropdown-item" href="<?php echo e(route('mission_vission')); ?>">Mission & Vission</a>
	          						
	          						<a class="dropdown-item" href="<?php echo e(route('team')); ?>">Management Team </a>
	          						<a class="dropdown-item" href="<?php echo e(route('award',['type'=>'certificate'])); ?>">Certificates </a>
	          						<a class="dropdown-item"   href="<?php echo e(route('award',['type'=>'achievement'])); ?>">Award & Achievement</a>
	          					
							    </div>
			                </li>
			                
			                   <li class="nav-item dropdown <?php echo e((request()->is('case/current')) ? 'active' : ''); ?> <?php echo e((request()->is('case/success')) ? 'active' : ''); ?> <?php echo e(request()->segment(1) == 'case-detail' && request()->segment(2) ? 'active' : ''); ?>">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            MEDICAL CASES
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    		<a class="dropdown-item" href="<?php echo e(url('case/current')); ?>">Current Cases</a>
	          						<a class="dropdown-item" href="<?php echo e(url('case/success')); ?>">Success  Cases</a>
	          					
							    </div>
			                </li> 
                            
                      
                              <li class="nav-item  <?php echo e((request()->is('initiative')) ? 'active' : ''); ?> <?php echo e(request()->segment(1) == 'initiative-detail' && request()->segment(2) ? 'active' : ''); ?>">
                                <a class="nav-link"   href="<?php echo e(route('initiative')); ?>">
                                    INITIATIVE
                                </a>
                            </li>  
                         
                            
			                 
      
                                       
                                    
                            
                           <li class="nav-item  <?php echo e((request()->is('activity')) ? 'active' : ''); ?> <?php echo e(request()->segment(1) == 'activity-detail' && request()->segment(2) ? 'active' : ''); ?>">
                                <a class="nav-link"   href="<?php echo e(route('activity')); ?>">
                                 LATEST    ACTIVITY
                                </a>
                            </li> 
                           
			               
                            <li class="nav-item dropdown <?php echo e((request()->is('event/upcoming')) ? 'active' : ''); ?> <?php echo e((request()->is('event/recent')) ? 'active' : ''); ?> <?php echo e(request()->segment(1) == 'event-detail' && request()->segment(2) ? 'active' : ''); ?>">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						            EVENTS
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    		<a class="dropdown-item" href="<?php echo e(url('event/upcoming')); ?>">Upcoming Events</a>
	          						<a class="dropdown-item" href="<?php echo e(url('event/recent')); ?>">Recent Events</a>
	          					
							    </div>
			                </li>     
                            
                            
                            <li class="nav-item dropdown <?php echo e((request()->is('gallery')) ? 'active' : ''); ?> <?php echo e((request()->is('video')) ? 'active' : ''); ?> ">
			                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						           GALLERY
						        </a>
			                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                    	
	          						<a class="dropdown-item" href="<?php echo e(route('gallery')); ?>">Photo Gallery</a>
	          						<a class="dropdown-item" href="<?php echo e(route('video')); ?>">Video Gallery </a>
							    </div>
			                </li> 
			                
                            <li class="nav-item  <?php echo e((request()->is('press-release')) ? 'active' : ''); ?>">
                                <a class="nav-link"   href="<?php echo e(route('press')); ?>">
                                    NEWS 
                                </a>
                            </li> 
	                     
	                        
			                
      		                  <li class="nav-item  <?php echo e((request()->is('our-blogs')) ? 'active' : ''); ?> <?php echo e(request()->segment(1) == 'our-blogs' && request()->segment(2) ? 'active' : ''); ?>">
                                <a class="nav-link"   href="<?php echo e(route('blogs')); ?>">
                                    BLOG </a>
                                </a>
                            </li>
                        
			                
	                                  
                            <!--<li class="nav-item  <?php echo e((request()->is('job-listing')) ? 'active' : ''); ?>">-->
                            <!--    <a class="nav-link"   href="<?php echo e(url('job-listing')); ?>">-->
                            <!--        CAREER</a>-->
                            <!--    </a>-->
                            <!--</li>  -->
                            
                             
                            
                             <li class="nav-item  <?php echo e((request()->is('contact-us')) ? 'active' : ''); ?>">
                                <a class="nav-link"   href="<?php echo e(route('contactus')); ?>">
                                    CONTACT </a>
                                </a>
                            </li>
                            
			            </ul>
			          
			        </div>
			    </nav>
			</div>
		</div>


    </div>
 
<?php /**PATH C:\xampp\htdocs\ngo-management-system\resources\views/partials/header.blade.php ENDPATH**/ ?>