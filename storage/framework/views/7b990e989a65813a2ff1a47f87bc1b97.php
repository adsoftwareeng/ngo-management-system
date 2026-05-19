
<?php $__env->startSection('content'); ?>
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(generalSetting()->site_name); ?></a></li>
                    
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
              
            </div>
          <!-- Form -->
          <hr/>
    <div class="row">
        <div class="col-12">
                 <form class="form-horizontal" action="<?php echo e(route('admin.donate.store')); ?>" method="post" id="addForm"   enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(isset($general)?$general->id:''); ?>">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Bank Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="bank_name" id="simpleinput" class="form-control" value="<?php echo e(isset($general)?$general->bank_name:old('bank_name')); ?>" placeholder="Enter Bank Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Account Holder Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="account_name" id="simpleinput" class="form-control" value="<?php echo e(isset($general)?$general->account_name:old('account_name')); ?>" placeholder="Enter Account Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Account  Number</label>
                                    <div class="col-md-10">
                                    <input type="text" name="account_no" id="simpleinput" class="form-control" value="<?php echo e(isset($general)?$general->account_no:old('account_no')); ?>" placeholder="Enter Account No">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Branch  Name</label>
                                    <div class="col-md-10">
                                    <input type="text" name="branch_name" id="simpleinput" class="form-control" value="<?php echo e(isset($general)?$general->branch_name:old('branch_name')); ?>" placeholder="Enter Brnach Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="example-email">Donate Image <br/><span class="text-info">(Size: 413 X 276)</span></label>
                                    <div class="col-md-6">
                                      <input type="file" class="filestyle" name="donate_image" accept="image/*" data-input="false">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?php echo e(isset($general)?asset('public/uploads/general/'.$general->donate_image):''); ?>" class="img-responsive w-25">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/admin/setting/donate.blade.php ENDPATH**/ ?>