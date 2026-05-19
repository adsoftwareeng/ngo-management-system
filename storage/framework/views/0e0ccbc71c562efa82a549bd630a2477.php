
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .eventImg{
        width:100% !important;
        height:250px !important;
    }
    .box-fundraising{
       background-color:#F8F8F8 !important;    
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
</style>

	<!-- HOW TO HELP US -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<!-- Item 1 -->
				<?php if(!empty($events)): ?>
                  <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising">
		              		<div class="media">
		              		    <div class="meta-date">
									<div class="date"><?php echo e(date('d',strtotime($enq->created_at))); ?></div>
									<div class="month"><?php echo e(date('M , y',strtotime($enq->created_at))); ?></div>
								</div>
		              		    <?php if($enq->type=='image'): ?>
		              			   <img src="<?php echo e(asset('public/uploads/activity/'.$enq->image)); ?>" alt="" class="img-responsive eventImg">
		              			<?php else: ?>
		              			    <iframe class="embed-responsive-item w-100" src="<?php echo e($enq->image); ?>"></iframe>
                                <?php endif; ?>
		              		</div>
		              		<div class="body-content">
		          <!--    		    	<div class="meta scrollDiv2">-->
    								<!--	<span class="location "><i class="fa fa-map-marker"></i> <?php echo e($enq->city); ?></span>-->
    								<!--</div>-->
		              			<p class="title scrollDiv"><a href="<?php echo e(url('activity-detail/'.$enq->slug)); ?>"><?php echo e($enq->name); ?></a></p>
		              		
		              		    <div class="text text-justify"><?php echo e(substr($enq->description,0,200)); ?>...</div>
		              			<div class="spacer-30"></div>
		              			<a href="<?php echo e(url('activity-detail/'.$enq->slug)); ?>" class="btn btn-primary pull-center text-center">READ MORE</a>
		              		</div>
			            </div>
			        </div>
			        <!-- Item 3 -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	<!-- OUR GALLERY -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/activity.blade.php ENDPATH**/ ?>