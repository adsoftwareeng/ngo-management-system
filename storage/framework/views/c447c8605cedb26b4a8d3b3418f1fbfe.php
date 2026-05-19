
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
    .txtColor{
        color:#FF7000 !important;
    }
</style>
<!-- main-area -->

	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

					<!-- Item 1 -->
				<?php if(!empty($blogs) && count($blogs)>0): ?>
                  <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising">
		              		<div class="media">
		              		    <div class="meta-date">
									<div class="date"><?php echo e(date('d',strtotime($enq->created_at))); ?></div>
									<div class="month"><?php echo e(date('M , y',strtotime($enq->created_at))); ?></div>
								</div>
		              		     <img src="<?php echo e(asset('public/uploads/blogs/'.$enq->image)); ?>" alt="<?php echo e($enq->title); ?>" class="img-responsive eventImg">
		              		</div>
		              		<div class="body-content">
		              		    <p class="title">
		              			    <a href="<?php echo e(url('our-blogs/'.$enq->slug)); ?>" class="txtColor text-capitalize">
		              			        <marquee>
		              			        <?php echo e($enq->title); ?>

		              			        </marquee>
		              			    </a>
		              			</p>
		              		
		              		    <div class="text text-justify"><?php echo substr(strip_tags($enq->description),0,138); ?>..</div>
		              			<a href="<?php echo e(url('our-blogs/'.$enq->slug)); ?>" class="btn btn-primary pull-center text-center mt-3">READ MORE</a>
		              		</div>
			            </div>
			        </div>
			        <!-- Item 3 -->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                	<div class="col-sm-4 col-md-4">
			            <div class="box-fundraising p-5 bg-info">
		              		<div class="body-content">
		              		    <p class="title">
		              			    <a href="#" class="txtColor text-capitalize">
		              			        No Blogs 
		              			    </a>
		              			</p>
		              		
		              		</div>
			            </div>
			        </div>
                <?php endif; ?>
				</div>

			</div>
		</div>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/blogs.blade.php ENDPATH**/ ?>