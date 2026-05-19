
<?php $__env->startSection('content'); ?>
<div class="account-content mt-4">
    <h3 class="text-center mb-1 mt-4 textDark">Sign In</h3>
    <!-- <p class="mb-2 textDark">Login Account</p> -->
    <form class="form-horizontal" action="<?php echo e(route('authenticate')); ?>" method="post">
                    <?php echo csrf_field(); ?>

        <div class="form-group row">
            <div class="col-12">
                <label for="emailaddress" class="textDark">Email address</label>
                <input class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" type="email">
                <?php if($errors->has('email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <!-- <a href="#" class="text-muted float-right"><small class="textDark">Forgot your password?</small></a> -->
                <label for="password" class="textDark">Password</label>
                <input type="password" class="form-control  <?php $__errorArgs = ['password'];
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
        <div class="form-group row text-center mt-2">
            <div class="col-12">
                <button class="btn btn-md btn-block btn-dark waves-effect waves-light" type="submit">
                    Submit
                </button>
                 <!--<a href="<?php echo e(url('register')); ?>" class="text-muted float-right mt-3">-->
                 <!--     <small class="textDark">Create an account</small>-->
                 <!-- </a>-->
            </div>
        </div>

    </form>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\iHunTech-projects\ngo-management-system\resources\views/auth/login.blade.php ENDPATH**/ ?>