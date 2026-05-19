<?php $__env->startSection('content'); ?>  
<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-6 col-md-6">
						<img src="<?php echo e(asset('public/frontend/images/404-img.jpg')); ?>" alt="" class="img-fluid">
					</div>

					<div class="col-sm-4 col-md-4">
						<p class="title-404 color-primary">4<span class="color-secondary">0</span>4</p>
						<p class="subtitle-404 color-secondary"><strong>Page</strong> Not Found!!</p>
						<p class="uk18">The page you looking for was moved, removed, or renamed or might never existed.</p>
						<div class="spacer-30"></div>
						<a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">BACK TO HOME</a>
					</div>

				</div>

			</div>
		</div>
	</div>
	


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/errors/404.blade.php ENDPATH**/ ?>