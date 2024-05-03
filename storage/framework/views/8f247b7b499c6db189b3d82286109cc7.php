<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div id="preloader">
</div>
    <div class="page-container">
  
        <div class="row">
                            
                        <div class="card">
                            <?php if(Auth::user()->email_verified_at): ?>
                            <form class="ms-auto me-auto mt-5" style="width : 750px" name="leave" action= "<?php echo e(route('welcome.post')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-center">
                                        <h4 class="header-title">Employee Leave Form</h4>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <p class="text-muted font-14 mb-4">Please fill up the form below.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Starting Date</label>
                                        <input class="form-control" type="date"  data-inputmask="'alias': 'date'" required id="example-date-input" name="startig_date">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">End Date</label>
                                        <input class="form-control" type="date"  data-inputmask="'alias': 'date'" required id="example-date-input" name="ending_date">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Your Leave Type</label>
                                        <select class="custom-select" name="leave_type" autocomplete="off">Choose Leave
                                            <option value="casual">Casual Leave</option>
                                            <option value="sick">Sick Leave</option>
                                            <option value="emergency">Emergency Leave</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Describe Your Conditions</label>
                                        <textarea class="form-control" name="remarks" type="text" name="remarks" length="400"  rows="5"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary mt-3 center" name="apply" id="apply" type="submit">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
                            <?php else: ?>
                            <div class="alert alert-warning" role="alert">
                        Please verify your email address to access the full features of our application. 
                        <!-- You can provide a link here to resend the verification email -->
                    </div>
                    <?php endif; ?>
                        
    </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\Leave Management\leave_app\resources\views/welcome.blade.php ENDPATH**/ ?>