
<?php $__env->startSection('content'); ?> 

<div class="section">
		<div class="pt-5 pb-3">
			<div class="container">
				<div class="row text-center  pull-center">
					<div class="col-md-6 offset-md-3">
					    <img src="<?php echo e(asset('public/check-green.gif')); ?>" class="img-responsive mb-2">
						<p class="subtitle-404 color-primary h1">Thank you for contacting us.</p>
						<p class="uk18">We appreciate that you are taken the time to write us. We'll get back to you very soon.</p>
						
						<a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">BACK TO HOME</a>
					</div>

				</div>

			</div>
		</div>
	</div>
	<div class="bgColor">
	    
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/thankyou.blade.php ENDPATH**/ ?>