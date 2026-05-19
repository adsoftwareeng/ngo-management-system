
<?php $__env->startSection('content'); ?>

<div class="account-content mt-4">
    <h5 class="text-uppercase mb-1 mt-4 text-center">Register</h5>
    <!-- <p class="mb-0">Get access to our admin panel</p> -->
        <form class="form-horizontal" action="<?php echo e(route('store')); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="form-group row">
           <div class="col-12">
            <label for="name" class="textDark">Name</label>
              <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>">
                <?php if($errors->has('name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
            </div>
        </div>
          <div class="form-group row">
            <div class="col-12">  
              <label for="email" class="textDark">Email Address</label>
              <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
          <div class="col-12">
            <label for="password" class="textDark">Password</label>
              <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password">
                <?php if($errors->has('password')): ?>
                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
        </div>
          <div class="form-group row">
            <div class="col-12">
               <label for="password_confirmation" class="textDark">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row text-center mt-2">
            <div class="col-12">
                <button class="btn btn-md btn-block btn-dark waves-effect waves-light" type="submit" value="Register">Register Now
                </button>
            </div>
        </div>
        
    </form>
    <div class="row mt-4 pt-2">
        <div class="col-sm-12 text-center">
                <p class="text-dark">Already have an account?  <a href="<?php echo e(route('login')); ?>" class="text-dark ml-1"><b>Sign In</b></a></p>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/auth/register.blade.php ENDPATH**/ ?>