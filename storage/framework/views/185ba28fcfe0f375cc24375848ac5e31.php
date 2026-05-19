
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
								<div class="date"><?php echo e(date('d',strtotime($events->event_date))); ?></div>
								<div class="month"><?php echo e(date('m,Y',strtotime($events->event_date))); ?></div>
							</div>
							<img src="<?php echo e(asset('public/uploads/event/'.$events->image)); ?>" alt="" class="img-fluid eventImg">
						</div>

						<div class="spacer-10"></div>

						<h2 class="color-secondary"><?php echo e($events->name); ?></h2>

						<div class="meta">
							<!--<span class="date"><i class="fa fa-clock-o"></i>  12:00 am - 5:00 pm</span>-->
							<span class="location"><i class="fa fa-map-marker"></i> <?php echo e($events->location); ?></span>
						</div>

						<div class="spacer-30"></div>

						<p class="uk18 color-secondary text-justify"><?php echo e($events->description); ?></p>
						
						<div class="spacer-30"></div>
						

					</div>
                   	<div class="col-sm-4 col-md-4 <?php echo e(($events->is_registration == 1) ? '' : 'd-none'); ?>">
						<div class="promo-ads" data-background="<?php echo e(asset('public/uploads/banner-ads.jpg')); ?>">
							<div class="content font__color-white">
								<i class="fa fa-bullhorn"></i>
								<h4 class="title">Event Registration</h4>
								<!--<p class="uk16">Join/p>-->
								<p class="font__color-white">The best way to find yourself is to lose yourself in the service of others. </p>
								<div class="spacer-30"></div>
								<a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">JOIN US NOW</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	
<!---->

	 <?php if(!empty($gallery) && count($gallery)>0): ?>
         <div class="section box-fundraising mb-0">
    		<div class="content-wrap pt-2">
    			<div class="container ">
                    		
    				<div class="row">
        				<div class="col-md-12">
    				    	<h2 class="section-heading">
    						   Event	Gallery 
    						</h2>
    					</div>
    					<!---->
    					
                        <div class="slider-container">
                            <div class="slider-wrapper" id="sliderWrapper">
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="slider-item">
                                        <img src="<?php echo e(asset('public/uploads/gallery/'.$enq->image)); ?>" class="img-fluid img-responsive galleryImg" alt="<?php echo e($enq->title); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="slider-nav">
                                <button id="prevBtn">&lt;</button>
                                <button id="nextBtn">&gt;</button>
                            </div>
                        </div>
            			<!---->
    				</div>
    			</div>
    		</div>
    	</div>
    <?php endif; ?>


	

<!---->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="<?php echo e(route('eventstore')); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              
          <div class="modal-header">
            <h4 class="modal-title textHeading" id="exampleModalLongTitle">Event Registration</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!---->
                <input type="hidden" name="event_id" value="<?php echo e($events->id); ?>">
                
				<div class="form-group row">
				       <label class="col-md-2">Name :</label>
				   	   <input type="text" class="form-control col-md-8" id="p_name" name="name" placeholder="" >
				</div>
				
				<div class="form-group row">
				    <label class="col-md-2">Email :</label>
					<input type="email" class="form-control col-md-8" id="p_email" name="email" placeholder="" >
					<div class="help-block with-errors"></div>
				</div>
				
				<div class="form-group row">
				    <label class="col-md-2">Phone : </label>
					<input type="text" class="form-control col-md-8" id="p_phone" name="phone" placeholder="">
					<div class="help-block with-errors"></div>
				</div>

                
				<div class="form-group row">
				    <label class="col-md-5">Identity (Aadhar Card) :</label>
					<input type="file" class="form-control col-md-5"  name="identity" placeholder="">
					<div class="help-block with-errors"></div>
				</div>				
				
				
				<div class="form-group row">
				    <label  class="col-md-6">Member of organization :</label>
					<input type="radio"   name="is_member_of_org" class="col-md-1" value="1" placeholder=""> Yes
					<input type="radio"  name="is_member_of_org"  class="col-md-1" value="0" placeholder=""> No
				</div>				
				
            <!---->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/events_details.blade.php ENDPATH**/ ?>