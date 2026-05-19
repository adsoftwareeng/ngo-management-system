
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
   .albumImg{
       width:100%;
       height:200px;
   } 
</style>

<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
				  	<?php if(!empty($gallery) && count($gallery)>0): ?>
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <div class="col-sm-6 col-md-4">
						<!-- BOX 1 -->
						<div class="box-news-1">
						    
							<div class="body">
							    <a href="<?php echo e(url('album/gallery/'.$enq->slug)); ?>">
								<img src="<?php echo e(asset('public/uploads/album/'.$enq->image)); ?>" title="<?php echo e($enq->alt); ?>" class="img-fluid albumImg border boder-round">
								</a>
								<div class="title mt-3"><a href="<?php echo e(url('album/gallery/'.$enq->slug)); ?>" title=""> <?php echo e($enq->title); ?> </a></div>
								
							</div>
						</div>
					</div>
	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?> 
    			 <div class="col-sm-12 col-md-12">
    					<!-- BOX 1 -->
    					<div class="box-news-1 p-5 bg-info text-white">
    					    <h2>No Album</h2>
    					</div>
    			  </div>
		    	<?php endif; ?>
					

				</div>

			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/album.blade.php ENDPATH**/ ?>