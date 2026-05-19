
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row popup-gallery gutter-5">
							<!-- ITEM 1 -->
						<?php if(!empty($gallery) && count($gallery)>0): ?>
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-xs-12 col-md-4">
								<div class="box-gallery galleryImage">
									<a href="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" title="<?php echo e($enq->title); ?>">
										<img src="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" alt="<?php echo e($enq->title); ?>" class="img-fluid img-responsive galleryImg">
										<div class="project-info">
											<div class="project-icon">
												<span class="fa fa-search"></span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							<?php else: ?>
							<div class="col-xs-12 col-md-12">
								<div class="box-gallery galleryImage pull-center text-center p-5 bg-info text-white">
									<h3>No Image</h3>
								</div>
							</div>
						
						<?php endif; ?>
						
							
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/gallery.blade.php ENDPATH**/ ?>