
    <!-- iziToast -->
    <link rel="stylesheet" href="<?php echo e(asset('public/iziToast.min.css')); ?>">
    <script src="<?php echo e(asset('public/iziToast.min.js')); ?>"></script>

    <?php if(session()->has('notify')): ?>
      <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            "use strict";
            iziToast.<?php echo e($msg[0]); ?>({message:"<?php echo e(trans($msg[1])); ?>", position: "topRight"});
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if($errors->any()): ?>
    <script>
        "use strict";
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            iziToast.error({
                message: '<?php echo e($error); ?>',
                position: "topRight"
            });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>

    <?php endif; ?>
    <script>
        "use strict";
        function notify(status, message) {
            if(typeof message == 'string'){
                iziToast[status]({
                    message: message,
                    position: "topRight"
                });
            }else{

                console.log(message);
                $.each(message, function(i, val) {
                    iziToast[status]({
                        message: val,
                        position: "topRight"
                    });
                });
            }
        }

        function notifyOne(status, message) {
             iziToast[status]({
                 message: message,
                 position: "topRight"
             });
        }
    </script>


<?php /**PATH C:\xampp\htdocs\ngo-management-system\resources\views/partials/notify.blade.php ENDPATH**/ ?>