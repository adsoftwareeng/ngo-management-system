
<?php $__env->startSection('content'); ?>  


<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- CONTENT -->
	<div class="section">
		<div class="pt-2 pb-2">
			<div class="container">
				<div class="row">
                    
					<div class="col-sm-12 col-md-12">
					  	<h2 class="section-heading">
					  	    <?php if($about->type=='president'): ?>
					  	      <?php echo e($page_title); ?>

					  	    <?php else: ?>
					  	    
                            <?php echo split_title($about->title); ?>

					  	    <?php endif; ?>
                        </h2>
					</div>
					<div class="col-sm-5 col-md-5">
						<img src="<?php echo e(asset('public/uploads/page/'.$about->image)); ?>" class="aboutImg img-responsive w-100 img-fluid img-border">		
						
                    	<div class="spacer-30"></div>
					</div>

					<div class="col-sm-7 col-md-7">
					      <?php if($about->type=='president'): ?>
					    	<h3>
					    	    <em>  <?php echo split_title($about->title); ?></em>
					    	 </h3>
					     <?php endif; ?>
						<p class="text-justify"><?php echo $about->summary; ?></p>
					
				    	<div class="spacer-30"></div>
					</div>
				</div>


				<div class="row">
				  <?php if(!empty($about->url)): ?>
				  	<div class="col-sm-6 col-md-6">
					  <div class="embed-responsive embed-responsive-16by9 mb-5">
        				  <iframe class="embed-responsive-item" src="<?php echo e($about->url); ?>?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen>
        				     
        				  </iframe>
    				 </div>
    		    	</div>
    		      <?php endif; ?>
    		      
    		      	  <?php if(!empty($about->url2)): ?>
				  	<div class="col-sm-6 col-md-6">
					  <div class="embed-responsive embed-responsive-16by9 mb-5">
        				  <iframe class="embed-responsive-item" src="<?php echo e($about->url2); ?>?rel=0&modestbranding=1&controls=0&showinfo=0&iv_load_policy=3" allow="autoplay; encrypted-media" allowfullscreen>
        				  </iframe>
    				 </div>
    		    	</div>
    		      <?php endif; ?>
		    	
                    	<div class="spacer-30"></div>
                </div>
                	<div class="row">
	            <?php echo $about->description; ?> 
                    	<div class="spacer-30"></div>
            
				    	
				</div>

			</div>
		</div>
	</div>

<!--  -->

<!--  -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/about.blade.php ENDPATH**/ ?>