<table class="table table-bordered">
	<tr><td><?php echo e(_lang('User Name')); ?></td><td><?php echo e($transaction->user->name); ?></td></tr>
	<tr><td><?php echo e(_lang('Account Number')); ?></td><td><?php echo e($transaction->user->account_number); ?></td></tr>
	<tr><td><?php echo e(_lang('User Email')); ?></td><td><?php echo e($transaction->user->email); ?></td></tr>
	<tr><td><?php echo e(_lang('Amount')); ?></td><td><?php echo e(decimalPlace($transaction->amount,currency($transaction->currency->name))); ?></td></tr>
	<tr><td><?php echo e(_lang('DR/CR')); ?></td><td><?php echo e(strtoupper($transaction->dr_cr)); ?></td></tr>
	<tr><td><?php echo e(_lang('Type')); ?></td><td><?php echo e($transaction->type); ?></td></tr>
	<tr><td><?php echo e(_lang('Description')); ?></td><td><?php echo e($transaction->description); ?></td></tr>
	<tr><td><?php echo e(_lang('Status')); ?></td><td><?php echo xss_clean(transaction_status($transaction->status)); ?></td></tr>
	<tr><td><?php echo e(_lang('Note')); ?></td><td><?php echo e($transaction->note); ?></td></tr>
	<tr><td><?php echo e(_lang('Sender')); ?></td><td><?php echo e($transaction->sender); ?></td></tr>
	<tr><td><?php echo e(_lang('Created At')); ?></td><td><?php echo e($transaction->created_at); ?></td></tr>
</table>

<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/deposit/modal/view.blade.php ENDPATH**/ ?>