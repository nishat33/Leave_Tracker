
<?php $__env->startSection('title', 'Registration'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">

    <div class="mt-5">
      <?php if($errors->any()): ?>

      <div class="col-12">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class = "alert alert-danger"> <?php echo e($error); ?> </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <?php endif; ?>

      <?php if(session()->has('error')): ?>
      <div class = "alert alert-danger"> <?php echo e(session('error')); ?> </div> 

      <?php endif; ?>

    </div>

      <form action= "<?php echo e(route('registration.post')); ?>" method="POST" class="ms-auto me-auto mt-5" style="width : 500px">
      <?php echo csrf_field(); ?>    
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">UserName</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="cpassword">
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\Leave Management\leave_app\resources\views/registration.blade.php ENDPATH**/ ?>