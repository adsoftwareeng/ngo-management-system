
<?php $__env->startSection('content'); ?>
  <!-- start page title -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".date", {
                enableTime: true,
                dateFormat: "d-m-Y h:i:K",
                
            });
        });
    </script>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(generalSetting()->site_name); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> <?php echo e($main_title); ?></a></li>
                    <li class="breadcrumb-item active"> <?php echo e($page_title); ?>  </li>
                </ol>
            </div>
            <h4 class="page-title"> <?php echo e($page_title); ?> </h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> <?php echo e($page_title); ?>  </h4>
                </div>
                <div class="col-2">
                    <a href="<?php echo e(route($go_back_url)); ?>" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> 
                        Go Back
                    </a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="<?php echo e(route('admin.activity.store')); ?>" method="post" id="addForm"   enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(isset($activity)?$activity->id:''); ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-control type" name="type">
                                         <option value="image"<?php echo e(isset($activity)?($activity->type=='image'?'selected':''):''); ?>>Image</option>
                                            <option value="video" <?php echo e(isset($activity)?($activity->type=='video'?'selected':''):''); ?>>Video</option>
                                         
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                    <div class="col-md-10">
                                    <input type="text" name="name" class="form-control" value="<?php echo e(isset($activity)?$activity->name:old('title')); ?>" placeholder="Enter title">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label inputName" for="example-email">Image</label>
                                    <div class="col-md-3">
                                      <input type="file" class="filestyle form-control  inputType" name="image"  accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <?php if(isset($activity)): ?>
                                          <?php if($activity->type=='image'): ?>
                                          <img 
                                            src="<?php echo e(isset($activity)?asset('public/uploads/activity/'.$activity->image):''); ?>" 
                                          class="img-responsive w-25">
                                          <?php else: ?>
                                          <iframe src="<?php echo e($activity->image); ?>">    
                                          </iframe>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                               <div class="form-group row">
                             <label class="col-md-2 col-form-label" for="example-range">Description</label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" placeholder="Enter description" name="description"><?php echo e(isset($activity)?$activity->description:old('description')); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Location</label>
                                    <div class="col-md-10">
                                    <input type="text" name="location" id="simpleinput" class="form-control" value="<?php echo e(isset($activity)?$activity->location:old('location')); ?>" placeholder="Enter location">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">City</label>
                                    <div class="col-md-10">
                                    <input type="text" name="city" class="form-control" value="<?php echo e(isset($activity)?$activity->city:old('city')); ?>" placeholder="Enter city">
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Start Date</label>
                                    <div class="col-md-10">
                                         
                                    <input type="text" name="start_date" id="start_date" class="form-control date" value="<?php echo e(isset($activity) ? date('d-m-Y', strtotime($activity->start_date)) :old('start_date')); ?>" placeholder="Enter Start Date">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">End Date</label>
                                    <div class="col-md-10">
                                         
                                    <input type="text" name="end_date" id="end_date" class="form-control date" value="<?php echo e(isset($activity) ? date('d-m-Y', strtotime($activity->end_date)) :old('end_date')); ?>" placeholder="Enter end Date">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="example-range">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="status">
                                            
                                            <option value="active" <?php echo e(isset($activity)?($activity->status=='active'?'selected':''):''); ?>>Active</option>
                                            <option value="inactive"<?php echo e(isset($activity)?($activity->status=='inactive'?'selected':''):''); ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                              <div class="form-group row pull-center text-center">
                                    <div class="col-md-12">
                                        <button  type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                            </form>

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->


<?php if(isset($activity)): ?>
  <?php if($activity->type=='video'): ?>
     <script>
          $('.inputName').text('Video URL');
          $('.inputType').attr('type','url'); 
          $('.inputType').val('<?php echo e($activity->image); ?>'); 
     </script>
  <?php endif; ?>
<?php endif; ?>
<script>
$(document).ready(function(){
    
  $(".type").change(function(){
      
      let type = $(this).val();
      //console.log(type);
      if(type=='video'){

          $('.inputName').text('Video URL');
          $('.inputType').attr('type','url');

      }else{

          $('.inputName').text('Image');
          $('.inputType').attr('type','file');
          $('.inputType').val('');

      }
  });
      
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/admin/activity/form.blade.php ENDPATH**/ ?>