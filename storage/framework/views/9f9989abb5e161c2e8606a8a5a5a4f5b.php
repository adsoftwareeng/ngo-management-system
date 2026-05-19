
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<!-- OUR GALLERY -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="row popup-gallery gutter-5">
							<!-- ITEM 1 -->
							<?php if(!empty($award)): ?>
                  <?php $__currentLoopData = $award; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-xs-6 col-md-4">
                    <div class="box-gallery">
                      <a href="<?php echo e(asset('public/uploads/award/'.$enq->image)); ?>" title="<?php echo e($enq->title); ?>">
                        <img src="<?php echo e(asset('public/uploads/award/'.$enq->image)); ?>" alt="<?php echo e($enq->title); ?>" class="img-fluid certificate">
                       
                      </a>
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
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/award.blade.php ENDPATH**/ ?>