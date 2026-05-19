
<?php $__env->startSection('content'); ?>

  <!-------------- start slider -------------->

    <?php if(!empty($slider) && count($slider)>0): ?>
  <!-- BANNER -->
	<div id="oc-fullslider" class="banner owl-carousel">
	     <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="owl-slide">
        	<div class="item">
        	    <?php if($slide->type=='video'): ?>
        	    <video width="100%" height="100%" auto controls autoplay class="videoDiv">
			      <source src="<?php echo e(asset('public/uploads/slider/'.$slide->image)); ?>" type="video/mp4">
			      <source src="<?php echo e(asset('public/uploads/slider/'.$slide->image)); ?>" type="video/ogg">
			    </video>
        	    <?php else: ?>
        	      <img src="<?php echo e(asset('public/uploads/slider/'.$slide->image)); ?>" alt="<?php echo e($slide->title); ?>">
        	    <?php endif; ?>
        	   <div class="slider-pos">
		            <div class="container">
		                  <?php if(!empty($slide->title)): ?>
		            	<div class="wrap-caption center">
			                <h1 class="caption-heading" style="color:<?php echo e($slide->color); ?>"><?php echo e($slide->title); ?></h1>
			                <p class="" style="color:<?php echo e($slide->color); ?>"><?php echo e($slide->description); ?></p>
			                <!--<a href="<?php echo e(url('donate-us')); ?>" class="btn btn-primary">DONATE NOW</a>-->
			            </div> 
			            <?php endif; ?>
		            </div>  
	            </div>  
            </div>  
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

	<div class="clearfix"></div>
	 
	<!-- SHORTCUT --> 
  <?php endif; ?>
  <!------------- end slider --------------->
  
	<div class="section services">
		<div class="content-wrap cardDiv  pb-0">
			<div class="container">
				<div class="row">
				    
					<div class="col-sm-12 col-md-12">
						<div class="row col-0 overlap">
							<div class="col-sm-4 col-md-4">
								<!-- BOX 1 -->
								<div class="rs-feature-box-1" data-background="<?php echo e(asset('public/frontend/images/cause-img-1.jpg')); ?>">
									<div class="body">
										<a href="<?php echo e(route(Auth::user() ? 'user.dashboard' : 'userlogin')); ?>" class="uk18">Generate ID Card</a>
										<h3>ID Card</h3>
									</div>
					            </div>
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- BOX 2 -->
								<div class="rs-feature-box-1 bgdark" data-background="<?php echo e(asset('public/frontend/images/bg-map-dot.jpg')); ?>">
									<div class="body">
										<a href="<?php echo e(route(Auth::user() ? 'user.dashboard' : 'userlogin')); ?>" class="uk18">Generate Appointment Letter</a>
										<h3>Appointment Letter</h3>
									</div>
					            </div>
							</div>
							<div class="col-sm-4 col-md-4">
								<!-- BOX 3 -->
								<div class="rs-feature-box-1" data-background="<?php echo e(asset('public/frontend/images/cause-img-2.jpg')); ?>">
									<div class="body">
										<a href="<?php echo e(route(Auth::user() ? 'user.dashboard' : 'userlogin')); ?>" class="uk18">Generate Certificate</a>
										<h3>Certificate</h3>
									</div>
					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
	<div class="clearfix"></div>
    	 <!-- initiatives -->

<!-- WELCOME TO NGOO-->
	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-2">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
			

						<h2 class="section-heading" data-aos="fade-up" data-aos-duration="1000">
							<?php echo split_title($about->title); ?>

							
							
						</h2>
					</div>
					
					<div class="col-md-6">
						<div class="hover-img"  data-aos="fade-up" data-aos-duration="1000">
							<img src="<?php echo e(asset('public/uploads/page/'.$about->image)); ?>" alt="<?php echo e($about->title); ?>" class="img-fluid">
						</div>
					</div>
					<div class="col-md-6">
						<p class="text-justify" data-aos="fade-down" data-aos-duration="1000"><?php echo $about->summary; ?></p>
						<div class="spacer-30"></div>
						<a href="<?php echo e(url('about')); ?>" data-aos="fade-up" data-aos-duration="1000" class="btn btn-primary">Read More</a>

					</div>


				</div>
			</div>
		</div>
	</div>

	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-2">
			<div class="container">
				<div class="row ">
                    <div class="col-md-12">
                        	<h2 class="section-heading" data-aos="fade-up" data-aos-duration="1000">
                        	    <span>President </span>Message
							
					    	</h2>
					
                    </div>
					<div class="col-md-6 col-12 order-2 order-lg-1">
					    
						<p class="text-justify" data-aos="fade-down" data-aos-duration="1000"><?php echo e($msg->summary); ?>

						  
						</p>
						 <em class="text-right pull-right"><?php echo e($msg->title); ?></em>
						<div class="spacer-30"></div>
						<a href="<?php echo e(url('pages/president')); ?>" data-aos="fade-up" data-aos-duration="1000" class="btn btn-primary">Read More</a>


					</div>
					
					<div class="col-md-6 col-12 order-1 order-lg-2">
					    <!--<div class="hover-img">-->
				     	<img src="<?php echo e(asset('public/uploads/page/'.$msg->image)); ?>" alt="<?php echo e($msg->title); ?>" data-aos="fade-down" data-aos-duration="1000" class=" img-responsive w-100">
				     		<div class="spacer-30"></div>
					    <!--</div>-->
						
					</div>


				</div>
			</div>
		</div>
	</div>
	<!--// video-->
	<?php $homeSection = getPages('home'); ?> 
	<?php if(!empty($homeSection->url) && !empty($homeSection->url2)): ?>
	<div class="section mt-4 mb-4"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				    <?php if(!empty($homeSection->url)): ?>
					<div class="col-sm-6 col-md-6">
					
					    <div class="embed-responsive embed-responsive-16by9 mb-3">
                          <iframe class="embed-responsive-item" src="<?php echo e(getPages('home')->url); ?>?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>

					</div>
                    <?php endif; ?>
                    <?php if(!empty($homeSection->url2)): ?>
					<div class="col-sm-6 col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="<?php echo e(getPages('home')->url2); ?>?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
					
					</div>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!--//end-->
	
	
		<?php if(!empty($homeSection->description)): ?>
	
	<?php $description =  json_decode($homeSection->description,true) ?> 
	<div class="section cta" data-background="<?php echo e(asset('public/frontend/2.jpg')); ?>"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap content-wrap-2x">
			<div class="container">
				<div class="row">
                    <?php for($i=1; $i<=4; $i++): ?>
					<div class="col-sm-3 col-md-3">
						<div class="rs-icon-funfact" data-aos="fade-up" data-aos-duration="1000">
							<div class="icon">
							    <i class="fa <?php echo e(@$description['icon'.$i]); ?>"></i>
								<!--<i class="fa fa-file-text-o"></i>-->
							</div>
							<div class="body-content">
								<h2><?php echo e(@$description['number'.$i]); ?></h2>
								<p class="uk18"><?php echo e(@$description['title'.$i]); ?></p>
							</div>
						</div>
					</div>
                    <?php endfor; ?>

				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>
	
	<!--// full width image-->
	<?php if(!empty($homeSection->image)): ?>
	<div class="section mb-5"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
		                <img src="<?php echo e(asset('public/uploads/page/'.$homeSection->image)); ?>" class="img-responsive w-100 banner1Image">
					</div>
        		</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if(!empty($homeSection->image3)): ?>
	<div class="section mb-4"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				    <?php $thirdImages = json_decode($homeSection->image3,true); ?> 
				    <?php $__currentLoopData = $thirdImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 	<div class="col-sm-4">
		                <img src="<?php echo e(asset('public/uploads/page/'.$image3)); ?>" class="img-responsive w-100 banner3Image mb-3">
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if(!empty($homeSection->image2)): ?>
	
	<div class="section mb-3"  data-aos="fade-up" data-aos-duration="500">
		<div class="">
			<div class="container">
				<div class="row">
				 <?php $secondImages = json_decode($homeSection->image2,true); ?> 
				    <?php $__currentLoopData = $secondImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 	<div class="col-sm-6">
		                <img src="<?php echo e(asset('public/uploads/page/'.$image2)); ?>" class="img-responsive w-100 banner2Image mb-3">
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!--// full width image-->
	
	
		<?php if(!empty($events)): ?>
	<div id="cause" class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-3 pb-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
						    Initiative
						</h2>
						
					</div>
					<div class="clearfix"></div>
					
                  <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  

					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising initiveBox">
		              		<div class="media">
		                		<img src="<?php echo e(asset('public/uploads/initiative/'.$enq->image)); ?>" alt="" class="img-responsive img-fluid initiveEventImg">
		              		</div>
		              		<div class="body-content">
		              			<!--<p class="title scrollDiv"><a href="<?php echo e(url('initiative-detail/'.$enq->slug)); ?>"><?php echo e($enq->name); ?></a></p>-->
		              				<p class="title mb-0">
		              				    <a href="<?php echo e(url('initiative-detail/'.$enq->slug)); ?>">
		              				        <marquee><?php echo e($enq->name); ?></marquee>
		              				    </a>
		              				</p>
		              			
		              			<div class="text text-justify initiveDecLength"><?php echo e(substr($enq->description,0,100)); ?></div>
		              			<div class="progress-fundraising pull-center text-center">
			              		    <a href="<?php echo e(url('initiative-detail/'.$enq->slug)); ?>" class="btn btn-primary">READ MORE</a>
			              		</div>
		              		</div>
			            </div>
			        </div>
							            
			        <!-- Item 3 -->
			        
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<div class="col-sm-12 col-md-12">
						<!--<div class="spacer-50"></div>-->
						<div class="text-center">
							<a href="<?php echo e(route('initiative')); ?>" class="btn btn-primary">View All</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
    	 <!---->

<!------------------------------------------------------------------------------------------------------------>

     	<!-- HOW TO HELP US -->
     <?php $howtohelpus = getPages('how_to_help_us'); ?> 
	<?php if(!empty($howtohelpus)): ?>
	<div class="section"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap-top">
			<div class="container">
				<div class="row align-items-end">

					<div class="col-sm-6 col-md-6">
						<img src="<?php echo e(asset('public/uploads/page/'.$howtohelpus->image)); ?>" alt="<?php echo e($howtohelpus->title); ?>"  class="img-fluid" data-aos="fade-up" data-aos-duration="1000">
					</div>

					<div class="col-sm-6 col-md-6">
						<h2 class="section-heading">
						    	<?php echo split_title($howtohelpus->title); ?>

						</h2>
						<div class="section-subheading">
						    <?php echo e($howtohelpus->summary); ?>

						</div> 
						<?php if(!empty($howtohelpus->description)): ?>
						<div class="margin-bottom-50"></div>
						<dl class="hiw" data-aos="fade-up" data-aos-duration="1000">
						    <?php $description =  json_decode($howtohelpus->description,true) ?> 
                           <?php for($i=1; $i<=3; $i++): ?>
						 
							<dt><span class="<?php echo e(@$description['icon'.$i]); ?>"></span></dt>
							<dd><div class="no">01</div>
							<h3>
							    <?php echo e(@$description['title'.$i]); ?>

							</h3>
							<?php echo e(@$description['description'.$i]); ?>

						</dd>
					    	<?php endfor; ?>
						</dl>
						<?php endif; ?>
						<div class="spacer-70"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>
     <!-- WE HELP MANY PEOPLE -->
	<div class="section" data-background="<?php echo e(asset('public/frontend/2.jpg')); ?>"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="cta-info color-white">
							<h1 class="section-heading light no-after" data-aos="fade-up" data-aos-duration="1000">
								<span>We Help Many</span> People
							</h1>
							<h3 class="color-primary">Want to Become a Volunteer</h3>

							<div class="spacer-10"></div>
							<p>Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent. Sed ut perspiciatis unde omnis iste natus error sit .</p>

							<a href="<?php echo e(url('donate-us')); ?>" class="btn btn-light margin-btn mb-2" data-aos="fade-up" data-aos-duration="1000">DONATE NOW</a>
							<a href="<?php echo e(url('join-us')); ?>" class="btn btn-primary margin-btn" data-aos="fade-up" data-aos-duration="1000">JOIN US </a>	
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- team -->
	<!-- OUR VOLUUNTER SAYS -->
	
	<?php echo $__env->make('partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	

	

    <!-- EVENTS -->
    <!-- FUN FACT -->
<!-- OUR GALLERY -->
<?php if(!empty($gallery) && count($gallery)>0): ?>
	<div class="section" data-background="#"  data-aos="fade-up" data-aos-duration="500">
		<div class="content-wrap pt-2 pb-0">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
							Our <span>Gallery</span>
						</h2>
					</div>

					<div class="row popup-gallery gutter-5">
					<?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-xs-12 col-md-4">
							<div class="box-gallery galleryImage" <?php if($key/2==0): ?> data-aos="fade-up" <?php elseif($key/2==1): ?> data-aos="fade-down" <?php else: ?> data-aos="fade-up" <?php endif; ?>  data-aos-duration="1000">
								<a href="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" title="<?php echo e($enq->title); ?> #<?php echo e($enq->id); ?>">
									<img src="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>"  alt="" class="img-fluid img-responsive galleryImg">
								</a>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
	
<!---->
<?php if($homeSection->popup_show=='show'): ?>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="<?php echo e(asset('public/uploads/page/'.$homeSection->popup)); ?>" class="img-responsive w-100">
      </div>
     
    </div>
  </div>
</div>
    <!-- Modal -->
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ngo-management-system\resources\views/home.blade.php ENDPATH**/ ?>