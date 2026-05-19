
<?php $__env->startSection('content'); ?>  

<?php echo $__env->make('partials.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- main-area -->
  

   	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">

                    <div class="col-xl-9 col-lg-8">
                        <div class="blog__details-wrapper">
                            <div class="blog__details-thumb">
                                <img src="<?php echo e(asset('public/uploads/blogs/'.$blogs->image)); ?>" alt="<?php echo e($blogs->title); ?> Blog Details" class="img-responsive w-100">
                                <p class="mt-3 txtColor">
                                    <i class="flaticon-calendar"></i> 
                                 <?php echo e(show_date($blogs->created_at)); ?>

                                </p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                
        						<h2 class="section-heading">
        							<?php echo split_title($blogs->title); ?>

        						</h2>
                		
        					</div>
                            <div class="blog__details-content">
                                
                                  <?php echo $blogs->description; ?>

                               
                            </div>
                        </div>
                       
                    </div>
                      <?php if(!empty($other_blog) && count($other_blog)>0): ?>
                      <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar">
                           
                            <div class="blog-widget">
                                <h4 class="widget-title">Other Blogs</h4>
                                <div class="shop-cat-list">
                                    <ul class="list-wrap">
                                       <?php $__currentLoopData = $other_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('our-blogs/'.$enq->slug)); ?>"> 
                                                 <i class="flaticon-angle-right"></i> <?php echo e(substr($enq->title,0,35)); ?>

                                            </a>
                                        </li>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                  <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- main-area-end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/blog_details.blade.php ENDPATH**/ ?>