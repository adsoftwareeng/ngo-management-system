
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
          <?php if(!empty($team)): ?>
            <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-sm-3 col-md-3">
									<div class="rs-team-1 mb-5">
										<div class="media">
										    <a href="<?php echo e(url('team-detail/'.$enq1->slug)); ?>">
											<img src="<?php echo e(asset('public/uploads/team/'.$enq1->image)); ?>" class="teamImg img-responsive "  alt="<?php echo e($enq1->name); ?>">
											</a>
										</div>
										<div class="body">
											<div class="title">
											    <a href="<?php echo e(url('team-detail/'.$enq1->slug)); ?>">
											        <?php echo e($enq1->name); ?>

											        </a></div>
											<div class="position"><?php echo e($enq1->designation); ?></div>
											
                                    					<!---->
                                    <?php if(!empty($enq1->social)): ?>
                                        <?php
                                            $socialData = json_decode($enq1->social, true); 
                                        ?>
                                        
                                            <?php $__currentLoopData = $socialData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if(!empty($value)): ?>
                                                <a href="<?php echo e($value['link'] ?? '#'); ?>" target="_blank" class="">
                                                    <span class="<?php echo e($value['icon'] ?? ''); ?> "></span>
                                                </a>
                                              <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
										<!---->
											
										</div>
									</div>
								</div>
					   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?> 
				</div>

			</div>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/team.blade.php ENDPATH**/ ?>