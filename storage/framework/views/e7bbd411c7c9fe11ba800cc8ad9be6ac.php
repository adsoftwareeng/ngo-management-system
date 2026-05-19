
<?php $__env->startSection('content'); ?>  


<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- CONTENT -->
	<div class="section">
		<div class="pt-4 pb-2">
			<div class="container">
				<div class="row">
                    
					<div class="col-sm-5 col-md-5">
						<img src="<?php echo e(asset('public/uploads/team/'.$team->image)); ?>" class="aboutImg img-responsive w-100 img-fluid img-border">		
						
                    	<div class="spacer-30"></div>
					</div>

					<div class="col-sm-7 col-md-7">
					     	<h3> <?php echo e($team->name); ?>  </h3>
					    <p class="text-justify">Designation: <?php echo e($team->designation); ?></p>
						<!--<div class="spacer-30"></div>-->
				    <?php if(!empty($team->social)): ?>
                        <?php
                            $socialData = json_decode($team->social, true); 
                        ?>
                        
                            <?php $__currentLoopData = $socialData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(!empty($value)): ?>
                                <a href="<?php echo e($value['link'] ?? '#'); ?>" target="_blank" class="">
                                    <span class="<?php echo e($value['icon'] ?? ''); ?> h5 pl-1"></span>
                                </a>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

				    	<div class="spacer-30"></div>
				    <p class="text-justify">
				         <?php echo e($team->description); ?>

				    </p>	
				    	 
				    	<div class="spacer-30"></div>
					</div>
				</div>


			</div>
		</div>
	</div>

<!--  -->
<!-- HOW TO HELP US -->

<?php if(!empty($otherteam) && count($otherteam)>0): ?>
	<div class="section">
		<div class="content-wrap pt-0">
			<div class="container">
				<div class="row">
				    	<div class="col-md-12 ">
			

						<h2 class="section-heading center" data-aos="fade-up" data-aos-duration="1000">
						Other <span>Management</span> Team
							
							
						</h2>
					</div>
            <?php $__currentLoopData = $otherteam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
				</div>

			</div>
		</div>
	</div>
	
<?php endif; ?> 
<!--  -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/team_detail.blade.php ENDPATH**/ ?>