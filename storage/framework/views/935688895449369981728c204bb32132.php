 <!--=================================
    Testimonial -->
  <?php if(!empty($testimonial) && count($testimonial)>0): ?>
     <div class="section" data-aos="fade-up" data-aos-duration="500">
  <div class="content-wrap pt-0 pb-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12">
          <h2 class="section-heading center">
             People <span>Love </span> Us
          </h2>
        </div>
        <!-- Owl Carousel Wrapper -->
        <div class="owl-carousel owl-theme testimonial-carousel">
          <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="testimonial-1 item">
            <div class="media">
              <img src="<?php echo e(asset('public/uploads/testimonials/'.$clients->image)); ?>" alt="" class="img-fluid">
            </div>
            <div class="body">
              <p class="text-justify"><?php echo e($clients->description); ?></p>
              <div class="title"><?php echo e($clients->name); ?></div>
              <div class="company"><?php echo e($clients->designation); ?></div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </div>
</div>
    <?php endif; ?>
    <!--=================================
    Testimonial --><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/partials/testimonials.blade.php ENDPATH**/ ?>