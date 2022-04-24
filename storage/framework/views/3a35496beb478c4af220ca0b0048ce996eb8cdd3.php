<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title text-center"><?php echo e(_lang('Manual Deposit Methods')); ?></h4>
			</div>
			<div class="card-body">
                <div class="row justify-content-md-center">
                <?php $__currentLoopData = $deposit_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="<?php echo e(asset('uploads/media/'.$deposit_method->image)); ?>" class="gateway-img"/>
                                <h5><?php echo e($deposit_method->name); ?></h5>
                                <h6 class="pt-1"><?php echo e(_lang('Deposit Limit')); ?> (<?php echo e(decimalPlace($deposit_method->minimum_amount, currency($deposit_method->currency->name))); ?> - <?php echo e(decimalPlace($deposit_method->maximum_amount, currency($deposit_method->currency->name))); ?>)</h6>
                                <h6 class="pt-1"><?php echo e(_lang('Deposit Charge')); ?> (<?php echo e(decimalPlace($deposit_method->fixed_charge, currency($deposit_method->currency->name))); ?> + <?php echo e($deposit_method->charge_in_percentage); ?>%)</h6>
                                <button data-href="<?php echo e(route('deposit.manual_deposit',$deposit_method->id)); ?>" data-title="<?php echo e(_lang('Deposit Via').' '.$deposit_method->name); ?>" class="btn btn-light mt-3 stretched-link ajax-modal"><?php echo e(_lang('Deposit Now')); ?></button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/customer_portal/deposit/manual_methods.blade.php ENDPATH**/ ?>