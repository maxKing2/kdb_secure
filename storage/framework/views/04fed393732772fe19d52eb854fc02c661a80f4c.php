<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title text-center"><?php echo e(_lang('Withdraw Methods')); ?></h4>
			</div>
			<div class="card-body">
                <div class="row justify-content-md-center">
                <?php $__currentLoopData = $withdraw_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="<?php echo e(asset('uploads/media/'.$withdraw_method->image)); ?>" class="gateway-img"/>
                                <h5><?php echo e($withdraw_method->name); ?></h5>
                                <h6 class="pt-1"><?php echo e(_lang('Withdraw Limit')); ?> (<?php echo e(decimalPlace($withdraw_method->minimum_amount, currency($withdraw_method->currency->name))); ?> - <?php echo e(decimalPlace($withdraw_method->maximum_amount, currency($withdraw_method->currency->name))); ?>)</h6>
                                <h6 class="pt-1"><?php echo e(_lang('Withdraw Charge')); ?> (<?php echo e(decimalPlace($withdraw_method->fixed_charge, currency($withdraw_method->currency->name))); ?> + <?php echo e($withdraw_method->charge_in_percentage); ?>%)</h6>
                                <a href="<?php echo e(route('withdraw.manual_withdraw',$withdraw_method->id)); ?>" data-title="<?php echo e(_lang('Withdraw Via').' '.$withdraw_method->name); ?>" class="btn btn-light mt-3 stretched-link"><?php echo e(_lang('Make Withdraw')); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
			</div>
		</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/customer_portal/withdraw/manual_methods.blade.php ENDPATH**/ ?>