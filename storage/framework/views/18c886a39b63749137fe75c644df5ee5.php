
<?php $__env->startSection('content'); ?>  
<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .box-fundraising{
        background-color:#F8F8F8;
        color:#000;
    }
</style>
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
                    <?php if(!empty($joblist) && count($joblist)>0): ?>
                        <?php $__currentLoopData = $joblist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<div class="col-sm-12 col-md-12">
    			            <div class="box-fundraising">
    		              		<div class="body-content">
    		              			<h3 class="">
    		              			    <a href="<?php echo e(url('job-detail/'.$jobs->slug)); ?>">
    		              			        <?php echo e($jobs->title); ?>

    		              			   </a>
    		              			</h3>
    		              			<div class="meta">
    		              			   
    									<span class="date"><i class="fa fa-clock-o"></i> <?php echo e(date('d M Y', strtotime($jobs->created_at))); ?></span>
    									<span class="location"><i class="fa fa-map-marker"></i> <?php echo e($jobs->location); ?></span>
    									
    								</div>
    		              			<div class="text mb-3">
    		              			    
    		              			    Skills :  <?php echo e($jobs->skills); ?>, 
    		              			    
    		              			     Experience : <?php echo e($jobs->experience); ?> ,
    		              			    Job Type : <?php echo e($jobs->job_type); ?> 
    		              			    ,
    		              			    No of Position: 
    		              			    <?php echo e($jobs->no_of_position); ?>, 
    		              			Last Date: <?php echo e($jobs->last_date_to_apply); ?>

    		              			<br/>
    		              			Description :
    		              			<?php echo e(\Illuminate\Support\Str::limit(strip_tags($jobs->description), 200)); ?>


    		              			</div>
    		              			<a href="<?php echo e(url('job-detail/'.$jobs->slug)); ?>" class="btn btn-primary">
    		              			    READ MORE
    		              			</a>
    		              			<a type="#" class="btn btn-info text-white   jobSelected" data-id="<?php echo e($jobs->id); ?>" data-toggle="modal" data-target="#exampleModalCenter">
    		              			    Apply Now
    		              			</a>
    		              		</div>
    			            </div>
    			        </div>
    			        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        <?php else: ?>
			     	<div class="col-sm-6 col-md-6">
			            <div class="box-fundraising">
		              	     <div class="body-content">
		              			<p class="title"><a href="#">No Jobs Available</a></p>
		              		</div>
			            </div>
			        </div>
			    
                    <?php endif; ?>
				</div>

			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/job_listing.blade.php ENDPATH**/ ?>