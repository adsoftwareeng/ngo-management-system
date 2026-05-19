
<?php $__env->startSection('content'); ?>
  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(generalSetting()->site_name); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);"> <?php echo e($main_title); ?></a></li>
                    <li class="breadcrumb-item active"> <?php echo e($page_title); ?> List </li>
                </ol>
            </div>
            <h4 class="page-title"> <?php echo e($page_title); ?> List</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row mb-2">
                <div class="col-10">
                    <h4 class="header-title"> <?php echo e($page_title); ?> List </h4>
                </div>
                <div class="col-2">
                    <a href="<?php echo e(route('admin.award.add')); ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add <?php echo e($delete_title); ?></a>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $award; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$key); ?></td>
                        <td><?php echo e($enq->title); ?></td>
                        <td class="w-25"><img src="<?php echo e(asset('public/uploads/award/'.$enq->image)); ?>" class="w-25 img-responsive"></td>
                        <td>
                       <?php echo e($enq->type); ?>

                        </td>
                        <td>
                         <?php if($enq->status=='inactive'): ?>
                                <span class='btn btn-danger btn-xs'>Inactive</span>
                         <?php else: ?>
                                <span class='btn btn-success btn-xs'>Active</span>
                         <?php endif; ?>
                        </td>
                        <td><?php echo e(show_date($enq->created_at)); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/award/edit/'.$enq->id)); ?>" class="btn btn-xs bg-primary text-white">
                                <i class="fa fa-edit"></i>
                            </a> |
                            <a href="#" class="btn btn-xs delete-btn bg-danger text-white" data-id="<?php echo e($enq->id); ?>">
                                <i class="fa fa-trash"></i>
                            </a> 
                        </td>
                    </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/admin/award/index.blade.php ENDPATH**/ ?>