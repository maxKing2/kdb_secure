<table class="table table-bordered">
	<tr><td><?php echo e(_lang('User Name')); ?></td><td><?php echo e($transaction->user->name); ?></td></tr>
	<tr><td><?php echo e(_lang('Account Number')); ?></td><td><?php echo e($transaction->user->account_number); ?></td></tr>
	<tr><td><?php echo e(_lang('User Email')); ?></td><td><?php echo e($transaction->user->email); ?></td></tr>
	<tr><td><?php echo e(_lang('Amount')); ?></td><td><?php echo e(decimalPlace($transaction->amount,currency($transaction->currency->name))); ?></td></tr>

	<?php if($transaction->type == 'Wire_Transfer'): ?>
	<tr><td><?php echo e(_lang('Bank Name')); ?></td><td><?php echo e($transaction->other_bank->name); ?></td></tr>
	<?php endif; ?>

	<?php if($transaction->transaction_details != null): ?>
		<?php $__currentLoopData = $transaction->transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e(ucwords(str_replace('_',' ',$key))); ?></td>
			<td><?php echo e($value); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
    <tr><td><?php echo e(_lang('DR/CR')); ?></td><td><?php echo e(strtoupper($transaction->dr_cr)); ?></td></tr>
	<tr><td><?php echo e(_lang('Type')); ?></td><td><?php echo e(str_replace("_"," ",$transaction->type)); ?></td></tr>
	<tr><td><?php echo e(_lang('Status')); ?></td><td><?php echo xss_clean(transaction_status($transaction->status)); ?></td></tr>
	<tr><td><?php echo e(_lang('Note')); ?></td><td><?php echo e($transaction->note); ?></td></tr>
	<tr><td><?php echo e(_lang('Created At')); ?></td><td><?php echo e($transaction->created_at); ?></td></tr>
	<tr><td><?php echo e(_lang('Created By')); ?></td><td><?php echo e($transaction->created_by->name); ?></td></tr>
</table>

<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/transfer_request/modal/view.blade.php ENDPATH**/ ?>