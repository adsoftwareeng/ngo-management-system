
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .eventImg{
        width:100% !important;
        height:200px !important;
        objct-fit:contain !important;
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
				<?php if(!empty($cases) && count($cases)>0): ?>
                  <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  	<div class="col-sm-12 col-md-12">
    			            <div class="box-fundraising">
    		              		<div class="body-content row">
    		              		<div class="col-md-4">
    		              		    <a href="<?php echo e(url('case-detail/'.$enq->slug)); ?>">
    		              		    <img src="<?php echo e(asset('public/uploads/cases/'.$enq->image)); ?>" alt="" class="img-responsive eventImg">
    		              		    </a>
    		              		</div>
    		              		<div class="col-md-8">
    		              		  	<h3 class="">
    		              			    <a href="<?php echo e(url('case-detail/'.$enq->slug)); ?>">
    		              			        <?php echo e($enq->title); ?>

    		              			   </a>
    		              			</h3>
    		              		   <div class="text mb-3">
    		              			   <p class="text-justify">    
    		              			<?php echo e(\Illuminate\Support\Str::limit(strip_tags($enq->description), 200)); ?>

    		              		        </p>

    		              			</div>
    		              			<a href="<?php echo e(asset('public/uploads/cases/'.$enq->beneficiary_form)); ?>" class="btn btn-primary" target="_blank">
    		              			   Beneficiary Form
    		              			</a>
    		              			<?php if($enq->type=='current'): ?>
    		              			<a href="<?php echo e($enq->donation_url); ?>" class="btn btn-info text-white" target="_blank">
    		              			    Donate Now <i class="fa fa-heart" aria-hidden="true"></i>
    		              			</a>
    		              			<?php else: ?>
		              				<a href="<?php echo e(asset('public/uploads/cases/'.$enq->discharge_summny)); ?>" class="btn btn-info text-white" target="_blank">
		              			          Discharge Summary
		              			</a>
    		              			<?php endif; ?>
    		              		
    		              		</div>
    		              		
    		              		</div>
    			            </div>
    			        </div>
			        <!-- Item 3 -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                		<div class="col-sm-12 col-md-12">
			            <div class="box-fundraising  ">
		              		<div class="body-content text-center pull-center bg-info text-white p-5">
                                   <h1>
                                        No Cases  in the database
                                    </h1>
		              		
		              		
		              		</div>
			            </div>
			        </div>
                
              <?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	<!-- OUR GALLERY -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/cases.blade.php ENDPATH**/ ?>