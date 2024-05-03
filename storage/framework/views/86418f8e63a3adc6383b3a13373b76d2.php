
<?php $__env->startSection('title', 'History'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container ">
        <div class="row mt-auto">
            <div class="col-md-12 mt-auto">
                <div class="card mt-auto">
                    <div class="card-body mt-auto">
                        <h4 class="header-title">Leave History Table</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-auto">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>User Name</th>
                                        <th>Starting Date</th>
                                        <th>Ending Date</th>
                                        <th>Leave Type</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $leaveHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="background-color: 
                                    <?php echo e($leave->status === 'pending' ? 'lightblue' : 
                                    ($leave->status === 'rejected' ? 'pink' : 
                                        ($leave->status === 'accepted' ? 'lightgreen' : 'inherit'))); ?> !important">
                                            <td> <?php echo e($leave->employee_username); ?></td>
                                            <td><?php echo e($leave->startig_date); ?></td>
                                            <td><?php echo e($leave->ending_date); ?></td>
                                            <td><?php echo e($leave->leave_type); ?></td>
                                            <td><?php echo e($leave->remarks); ?></td>
                                            <td style="background-color: <?php echo e($leave->status == 'pending' ? 'lightblue' : 'inherit'); ?>"><?php echo e($leave->status); ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\Leave Management\leave_app\resources\views/history.blade.php ENDPATH**/ ?>