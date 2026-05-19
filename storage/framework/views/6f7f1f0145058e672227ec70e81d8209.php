
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .eventImg{
        width:100% !important;
        height:300px !important;
        object-fit:contain;
    }
    .box-fundraising{
       background-color:#F8F8F8 !important;    
    }
    .txtColor{
        color:#FF7000;
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
    
   

</style>


<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
             	<div class="row mb-2">

					<div class="col-sm-8 col-md-8">

						<div class="img-date">
							<div class="meta-date">
								<div class="date"><?php echo e(date('d',strtotime($events->created_at))); ?></div>
								<div class="month"><?php echo e(date('m,Y',strtotime($events->created_at))); ?></div>
							</div>
    	    				
    	    				<?php if($events->type=='image'): ?>
                  			   <img src="<?php echo e(asset('public/uploads/activity/'.$events->image)); ?>" alt="" class="img-responsive eventImg">
                  			<?php else: ?>
                  			    <iframe class="embed-responsive-item" src="<?php echo e($events->image); ?>" style="height:280px; width:100%"></iframe>
                            <?php endif; ?>
						</div>

						<div class="spacer-10"></div>

						<h2 class="color-secondary"><?php echo e($events->name); ?></h2>
                         <?php if(!empty($events->city) && !empty($events->location)): ?>
						<div class="meta">
						    <?php if(!empty($events->city)): ?>
							<span class="location"><i class="fa fa-map-marker"></i> <?php echo e($events->city); ?></span>
							<?php endif; ?>
							
						    <?php if(!empty($events->location)): ?>
							<span class="location"><i class="fa fa-map-marker"></i> <?php echo e($events->location); ?></span>
							<?php endif; ?>
						</div>
                      	<div class="spacer-30"></div>
                         <?php endif; ?>
						<p class="uk18 color-secondary text-justify"><?php echo e($events->description); ?></p>
						

					</div>
					<?php if(!empty($other_activity) && count($other_activity)>0): ?>
                   	<div class="col-sm-4 col-md-4">
							
								<h3 class=" text-dark">Other Activity</h3>
							    <ul>
							        <?php $__currentLoopData = $other_activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            							<li class="txtColor"><a href="<?php echo e(url('activity-detail/'.$enq->slug)); ?>" class="text-dark">  <?php echo e($enq->name); ?></a></li>
            						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        						</ul>
                    </div>
                    <?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
	
<!---->


	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/activity_details.blade.php ENDPATH**/ ?>