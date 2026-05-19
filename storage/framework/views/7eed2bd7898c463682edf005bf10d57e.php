
<?php $__env->startSection('content'); ?>  

<style>
    .eventImg{
        width:100% !important;
        height:300px !important;
        object-fit:contain;
    }
    .box-fundraising{
       background-color:#F8F8F8 !important;    
    }
    .text{
        color:#816f6f;
    }
    .scrollDiv{
         overflow-x:scroll;
         /*text-overflow: ellipsis;*/
         white-space: nowrap;
         width: 100%; /* Adjust as needed */
    }
    .scrollDiv::-webkit-scrollbar {
        width:5px;
        height:2px;
        background-color:#FF7000;
    }
    
    .scrollDiv2{
         overflow-x:scroll;
         /*text-overflow: ellipsis;*/
         white-space: nowrap;
         width: 100%; /* Adjust as needed */
    }
    .scrollDiv2::-webkit-scrollbar {
        width:5px;
        height:0px;
        /*background-color:#FF7000;*/
    }
    label{
        color:#816f6f;
    }
    .textHeading{
        color:#FF7000;
    }
    
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
          .sliderImage{
            height:200px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    }
    
    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
          .sliderImage{
            height:200px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    }
    
    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
          .sliderImage{
            height:300px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }
        
    } 
    
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
              .sliderImage{
                height:300px !important;
                /*object-fit:contain !important;*/
                width:100% !important;
            }
            
    } 
    
    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
          .sliderImage{
            height:360px !important;
            /*object-fit:contain !important;*/
            width:100% !important;
        }

    }
  </style>
      
<!-- BANNER -->
<div class="section banner-page" data-background="<?php echo e(asset('public/uploads/initiative/'.$events->image)); ?>">
		<div class="content-wrap pos-relative">
			<div class="d-flex justify-content-center bd-highlight mb-3">
				<div class="title-page"><?php echo e($page_title); ?></div>
			</div>
			<div class="d-flex justify-content-center bd-highlight mb-3">
			    <nav aria-label="breadcrumb">
				  <ol class="breadcrumb ">
				    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?php echo e($page_title); ?></li>
				  </ol>
				</nav>
		  	</div>
		</div>
	</div>



<!-- HOW TO HELP US -->
<!---->
	<div class="section">
		<div class="content-wrap pt-2">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading">
							<?php echo split_title($events->name); ?>

						</h2>
                    </div>
                    
					<div class="col-sm-6 col-md-6">
					    	<!-------------------->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100 img-responsive sliderImage" src="<?php echo e(asset('public/uploads/initiative/'.$events->image)); ?>" alt="<?php echo e($events->name); ?>">
                                </div>
                                <?php if(!empty($events->image2)): ?>
                                <div class="carousel-item">
                                  <img class="d-block w-100 img-responsive sliderImage" src="<?php echo e(asset('public/uploads/initiative/'.$events->image2)); ?>" alt="<?php echo e($events->name); ?>">
                                </div>
                                <?php endif; ?>
                                <?php if(!empty($events->image3)): ?>
                                <div class="carousel-item">
                                  <img class="d-block w-100 img-responsive sliderImage" src="<?php echo e(asset('public/uploads/initiative/'.$events->image3)); ?>" alt="<?php echo e($events->name); ?>">
                                </div>
                                <?php endif; ?>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        <!--------------------->
						<!--<div class="img-video">-->
						<!--	<a href="<?php echo e($events->video); ?>" class="popup-youtube play-video"><i class="fa fa-play fa-2x"></i></a>-->
						<!--	<img src="<?php echo e(asset('public/uploads/initiative/'.$events->video_image)); ?>" alt="">-->
						<!--	<div class="ripple"></div>-->
						<!--</div>-->
						 <div class="spacer-30"></div>
						
                	</div>
					<div class="col-sm-6 col-md-6">
					    	<?php if(!empty($events->subtitle)): ?>
    				        	<blockquote class="text-justify"><?php echo e($events->subtitle); ?> </blockquote>
    					   <?php endif; ?>
                            <p class="text text-justify"><?php echo e($events->description); ?></p>
    						
					</div>

                     <!---->
                      <div class="col-sm-12 col-md-12">
                            <?php echo $events->add_more; ?>

                      </div>
                   <?php if(!empty($faq) && count($faq)>0): ?>
                   <div class="spacer-30"></div>
                        <div class="col-sm-12 col-md-12">
    						<h2 class="section-heading">
    							Frequently Asked Questions (FAQs)
    						</h2>
    						<!--<div class="section-subheading"><?php echo e($events->faq_description); ?></div> -->
    						<!--<div class="margin-bottom-50"></div>-->
    						
    						<div class="accordion rs-accordion" id="accordionExample">
    							<!-- Item 1 -->
    						<?php $i=1 ?> 
    						<?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    						
    						 <?php if($i==1): ?>
    						  <div class="card mb-2">
    						    <div class="card-header" id="heading<?php echo e($i); ?>">
    						      <h4 class="title">
    						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($i); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($i); ?>">
    						          <?php echo e($faqs->heading); ?>

    						        </button>
    						      </h4>
    						    </div>
    						    <div id="collapse<?php echo e($i); ?>" class="collapse show" aria-labelledby="heading<?php echo e($i); ?>" data-parent="#accordionExample" style="">
    						      <div class="card-body">
    						           <?php echo e($faqs->description); ?>

    						      </div>
    						    </div>
    						  </div>
                              <?php else: ?>
    							<!-- Item 2 -->
    						  <div class="card mb-2">
    						    <div class="card-header" id="heading<?php echo e($i); ?>">
    						      <h4 class="title">
    						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($i); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($i); ?>">
    						          <?php echo e($faqs->heading); ?>

    						        </button>
    						      </h4>
    						    </div>
    						    <div id="collapse<?php echo e($i); ?>" class="collapse" aria-labelledby="heading<?php echo e($i); ?>" data-parent="#accordionExample" style="">
    						      <div class="card-body">
    						         <?php echo e($faqs->description); ?>

    						       </div>
    						    </div>
    						  </div>
    						  <?php endif; ?>
    				        <?php  $i++; ?>
    						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    						</div>
    					</div>
    				<?php endif; ?>
						 <!---->
				</div>
    
			</div>
		</div>
	</div>
<!-- HOW TO HELP US -->
	
<!---->
    <?php if(!empty($gallery) && count($gallery)>0): ?>
         <div class="section box-fundraising mb-0">
    		<div class="content-wrap pt-2">
    			<div class="container ">
                    		
    				<div class="row">
        				<div class="col-md-12">
    				    	<h2 class="section-heading">
    						   Initiative	Gallery 
    						</h2>
    					</div>
    					<!---->
    				    <div class="slider-container">
                            <div class="slider-wrapper" id="sliderWrapper">
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="slider-item">
                                        <img src="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" class="img-fluid img-responsive galleryImg" alt="<?php echo e($enq->title); ?>">
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
    	</div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/initiative_details.blade.php ENDPATH**/ ?>