<?php if(auth()->check() && auth()->user()->isAdmin()): ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <a class="navbar-brand disabled" href="#">Prepared for <?php echo e(config('app.name')); ?></a>
   <small> by nishat tasnim </small>

    <button class="navbar-toggler disabled" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon disabled"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav nav-fill w-100 mb-2 mb-lg-0">
      <?php if(auth()->guard()->check()): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo e(route('leave.history')); ?>">History</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Admin Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('home')); ?>">Application</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('registration')); ?>">Registration</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
        </li>
        <?php endif; ?>
      </ul>
      <!-- <span class="navbar-text me-5" name="username">
      <a class="nav-link" href="#">Logout</a>
      </span> -->
    </div>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <a class="navbar-brand disabled" href="#">Prepared for <?php echo e(config('app.name')); ?></a>
   <small> by nishat tasnim </small>
    <button class="navbar-toggler disabled" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon disabled"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav nav-fill w-100 mb-2 mb-lg-0">
      <?php if(auth()->guard()->check()): ?>
      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo e(route('leave.history')); ?>">History</a>
        </li>

        
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('home')); ?>">Application</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('registration')); ?>">Registration</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
        </li>
        <?php endif; ?>
      </ul>
      <!-- <span class="navbar-text me-5" name="username">
      <a class="nav-link" href="#">Logout</a>
      </span> -->
    </div>
  </div>
</nav>
        
        
        <?php endif; ?>
<?php /**PATH E:\Work\Leave Management\leave_app\resources\views/include/header.blade.php ENDPATH**/ ?>