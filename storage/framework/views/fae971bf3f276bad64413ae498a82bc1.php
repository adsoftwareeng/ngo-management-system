
	<!-- CTA -->
	<div class="section cta mt-5">
		<div class="content-wrap-20">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="cta-1">
			              	<div class="body-text">
			                	<h3><?php echo e(generalSetting()->call_note); ?></h3>
			              	</div>
			              	<div class="body-action">
			                	<a href="<?php echo e(route('donate')); ?>" class="btn btn-secondary">DONATE NOW</a>
			              	</div>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	  <?php if(!empty(getGallery('partner')) && count(getGallery('partner'))>0): ?>
    
         <div class="section mt-0 mb-4">
    			<div class="container">
    			    <div class="row">
    			        
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
							Our <span>Partner</span>
						</h2>
					</div>

    			    </div>
                    <div class="row">
        				<div class="slider-container">
                            <div class="slider-wrapper" id="sliderWrapper">
                                <?php $__currentLoopData = getGallery('partner'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="slider-item">
                                        <img src="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" class="img-fluid img-responsive" style="width:100%; height:150px;" alt="<?php echo e($enq->title); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="slider-nav">
                                <button id="prevBtn">&lt;</button>
                                <button id="nextBtn">&gt;</button>
                            </div>
                        </div>
            			<!---->
    				</div>
    			</div>
    	</div>
    	<hr class="bgColor" style="height:6px;">
    <?php endif; ?>

	

<!-- FOOTER SECTION -->
	<div class="footer bg-white">
		<div class="content-wrap pt-2 pb-2">
			<div class="container">
				
				<div class="row">
					<div class="col-sm-3 col-md-3">
						<div class="footer-item">
							<img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->logo_2)); ?>" alt="<?php echo e(generalSetting()->site_name); ?> Logo" class="logo-bottom w-25">
							<!--<div class="spacer-30"></div>-->
							<p class="text-justify mb-1"><?php echo e(substr(generalSetting()->footer_about,0,136)); ?>..</p>
							<a href="<?php echo e(url('about')); ?>"><i class="fa fa-angle-right"></i> Read More</a>
						</div>
					</div>

					<div class="col-sm-3 col-md-3">
						<div class="footer-item">
							<div class="footer-title">
								QUICK LINKS
							</div>
							
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<ul class="list">
										<li><a href="<?php echo e(url('about')); ?>" title="About us">About us</a></li>
										<li><a href="<?php echo e(url('press-release')); ?>" title="News">News</a></li>
									
										<li><a href="<?php echo e(url('gallery')); ?>" title="Gallery">Gallery</a></li>
									    <li><a href="<?php echo e(route('job.listing')); ?>" title="Career">Career</a></li>
							       	<li><a href="<?php echo e(url('join-us')); ?>">Join Us</a></li>
									</ul>
								</div>
								<div class="col-sm-6 col-md-6">
									<ul class="list">
										<li><a href="<?php echo e(url('team')); ?>" title="Our Team">Our Team</a></li>
										<li><a href="<?php echo e(url('event/upcoming')); ?>" title="Events">Events</a></li>
										<li><a href="<?php echo e(route('donate')); ?>">Donate Us</a></li>
										<li><a href="<?php echo e(url('contact')); ?>" title="Contact Us">Contact Us</a></li>
										
										<li><a href="<?php echo e(url('register')); ?>">Register </a></li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-3 col-md-3">
						<div class="footer-item">
							<div class="footer-title">
							CONTACT US
							</div>
							<ul class="list-info">
								<li>
									<div class="info-icon">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text"><a href="http://maps.google.com/?q=<?php echo e(generalSetting()->address); ?>"><?php echo e(generalSetting()->address); ?></a></div> </li>
								<li>
									<div class="info-icon">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text"><a href="tel:<?php echo e(generalSetting()->phone); ?>" target="_blank"><?php echo e(generalSetting()->phone); ?></a></div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text"><a href="mailto:<?php echo e(generalSetting()->email); ?>" target="_blank"><?php echo e(generalSetting()->email); ?></a></div>
								</li>
							
							</ul>
                        
							
						</div>
					</div>
					
					<div class="col-sm-3 col-md-3">
						<div class="footer-item">
							<div class="footer-title">
							TIMING &	FOLLOW US
							</div>
						    	<ul class="list-info">
    								<li>
    									<div class="info-icon">
    										<span class="fa fa-clock-o"></span>
    									</div>
    									<div class="info-text">Mon - Sat :  <?php echo e(generalSetting()->mon_sat_time); ?></div>
    								</li>
    								<li>
    									<div class="info-icon">
    										<span class="fa fa-clock-o"></span>
    									</div>
    									<div class="info-text">  Sun : <?php echo e(generalSetting()->sat_sun_time); ?></div>
    								</li>
    							</ul>
							<!--<div class="sosmed-icon primary">-->
						    <div class="sosmed-icon primary pt-2">
								<a href="<?php echo e(generalSetting()->fb); ?>" class="p-0"><i class="fa fa-facebook"></i></a> 
								<a href="<?php echo e(generalSetting()->twitter); ?>" class="p-0"><i class="fa fa-twitter"></i></a> 
								<a href="<?php echo e(generalSetting()->instagram); ?>" class="p-0"><i class="fa fa-instagram"></i></a> 
								<a href="<?php echo e(generalSetting()->linkedin); ?>" class="p-0"><i class="fa fa-linkedin"></i></a> 
							</div>
							
    						
							
								
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="fcopy bgColor pt-3 pb-0">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12  text-center pull-center">
						<p class="ftex text-center pull-center text-white"><?php echo e(generalSetting()->copyright); ?>

						<!--<span class="pl-5 text-white text-right pull-right">-->
						<!--	<a href="<?php echo e(generalSetting()->fb); ?>"><i class="fa fa-facebook text-white h6"></i></a> -->
						<!--		<a href="<?php echo e(generalSetting()->twitter); ?>"><i class="fa fa-twitter text-white h6"></i></a> -->
						<!--		<a href="<?php echo e(generalSetting()->instagram); ?>"><i class="fa fa-instagram text-white h6"></i></a> -->
						<!--		<a href="<?php echo e(generalSetting()->linkedin); ?>"><i class="fa fa-linkedin text-white h6"></i></a> -->
						<!--	</span>-->
						    <span class="designBy"></span>
						</p>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
<?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/partials/footer.blade.php ENDPATH**/ ?>