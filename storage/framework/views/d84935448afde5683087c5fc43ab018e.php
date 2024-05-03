
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-primary-subtle clickable-card" onclick="toggleTable('pending-requests-table')">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text">10 pending leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 ">
                <div class="card-body bg-success-subtle clickable-card" onclick="window.location='#';"">
                    <h5 class="card-title">Accepted Requests</h5>
                    <p class="card-text">25 accepted leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body bg-danger-subtle clickable-card" onclick="window.location='#';"">
                    <h5 class="card-title">Rejected Requests</h5>
                    <p class="card-text">5 rejected leave requests</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-warning-subtle clickable-card" onclick="window.location='#';"">
                <div class="card-body ">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">100 employees</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="container">
    <div class="row mt-auto">
        <div class="col-md-12 mt-auto">
            <div class="card mt-auto">
                <div class="card-body mt-auto">
                    <h4 class="header-title">Pending Leave Requests</h4>
                    <div class="table-responsive" id="pending-requests-table">
                        <table class="table table-bordered table-striped mt-auto">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Leave Type</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $leaveHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($leave->status == 'pending'): ?>
                                        <tr style="background-color: lightblue">
                                            <td><?php echo e($leave->starting_date); ?></td>
                                            <td><?php echo e($leave->ending_date); ?></td>
                                            <td><?php echo e($leave->leave_type); ?></td>
                                            <td><?php echo e($leave->remarks); ?></td>
                                            <td><?php echo e($leave->status); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\Leave Management\leave_app\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>