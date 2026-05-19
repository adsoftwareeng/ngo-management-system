
<?php $__env->startSection('content'); ?>
  <!-- start page title -->
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
                    <a href="<?php echo e(redirect()->getUrlGenerator()->previous()); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> GO Back</a>
                </div>
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form  action="<?php echo e(route('admin.page.store')); ?>" method="post"    enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(isset($page)?$page->id:''); ?>">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Title/Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="title" id="simpleinput" class="form-control" value="<?php echo e(isset($page)?$page->title:old('title')); ?>" placeholder="Enter Name">
                                    </div>
                                </div>
                                 <input type="hidden" name="type" value="<?php echo e($type); ?>">
                                 
                                  <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Image</label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo e(isset($page)?asset('public/uploads/page/'.$page->image):''); ?>" class="img-responsive w-25">
                                    </div>
                                </div>

                                
                                
                              <div class="form-group row">
                                   <label class="col-md-2 col-form-label" for="example-range">
                                       Summary
                                   </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control" style="height:100px;" placeholder="Enter summary" name="summary"><?php echo e(isset($page)?$page->summary:old('summary')); ?></textarea>
                                    </div>
                                </div>
                             
                                  <div class="form-group row">
                                     <label class="col-md-2 col-form-label" for="example-range">Description
                                    </label>
                                    <div class="col-md-10">
                                       <textarea class="form-control summernote"  placeholder="Enter " name="description"><?php echo e(isset($page)?$page->description:old('description')); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url"  class="form-control" value="<?php echo e(isset($page)?$page->url:old('url')); ?>" placeholder="Enter  URL">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Video URL 2</label>
                                    <div class="col-md-10">
                                    <input type="text" name="url2"  class="form-control" value="<?php echo e(isset($page)?$page->url2:old('url2')); ?>" placeholder="Enter  URL2">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/admin/page/about.blade.php ENDPATH**/ ?>