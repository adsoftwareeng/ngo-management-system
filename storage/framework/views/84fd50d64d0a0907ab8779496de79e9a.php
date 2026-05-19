
<?php $__env->startSection('content'); ?>  


<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- CONTENT -->
	<div class="section">
		<div class="content-wrap mb-0 pb-0">
			<div class="container">
				<div class="row">
                    	<div class="col-sm-6 col-md-6">
						
						<h2 class="section-heading">
                          Mission
                                    
						</h2>

						<p class="text-justify"><?php echo e($mission->description); ?></p>
						<div class="spacer-30"></div>
						

					</div>
					<div class="col-sm-6 col-md-6">
						<h2 class="section-heading">
                          Vission
                                    
						</h2>

						<p class="text-justify"> <?php echo e($mission->summary); ?></p>
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

		</div>
	</div>
	
<?php echo $__env->make('partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
                    	<div class="spacer-70"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/mission_vission.blade.php ENDPATH**/ ?>