
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row ">
							<!-- ITEM 1 -->
						<?php if(!empty($gallery)): ?>
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="col-md-4">
                                 <div class="embed-responsive embed-responsive-16by9 mb-4">
                                 <iframe width="853" height="480" src="<?php echo e($enq->image); ?>" class="embed-responsive-item" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                 </div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						
							
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/video.blade.php ENDPATH**/ ?>