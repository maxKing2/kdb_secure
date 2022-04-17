<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-primary">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Active Users')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e($active_customer); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('users.filter')); ?>/active"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-danger">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Pending KYC')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(kyc_count(false)); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('users.documents')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-info">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Pending Tickets')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('pending_tickets')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('support_tickets.index',['status' => 'pending'])); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-primary">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Deposit Requests')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('deposit_requests')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('deposit_requests.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-secondary">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Withdraw Requests')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('withdraw_requests')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('withdraw_requests.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-success">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Loan Requests')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('pending_loans')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('loans.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-3 border-bottom-card border-dark">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('FDR Requests')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('fdr_requests')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('fixed_deposits.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card mb-4 border-bottom-card border-primary">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h5><?php echo e(_lang('Wire Transfer Requests')); ?></h5>
							<h6 class="pt-1 mb-0"><b><?php echo e(request_count('wire_transfer_requests')); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('transfer_requests.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-4">
		<div class="card-header">
			<?php echo e(_lang('Recent Transactions')); ?>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
					    <tr>
							<th><?php echo e(_lang('Date')); ?></th>
							<th><?php echo e(_lang('User')); ?></th>
							<th><?php echo e(_lang('Currency')); ?></th>
							<th><?php echo e(_lang('Amount')); ?></th>
							<th><?php echo e(_lang('Charge')); ?></th>
							<th><?php echo e(_lang('Grand Total')); ?></th>
							<th><?php echo e(_lang('DR/CR')); ?></th>
							<th><?php echo e(_lang('Type')); ?></th>
							<th><?php echo e(_lang('Method')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
					    </tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $recent_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
							$symbol = $transaction->dr_cr == 'dr' ? '-' : '+';
                			$class  = $transaction->dr_cr == 'dr' ? 'text-danger' : 'text-success';
							?>
							<tr>
								<td><?php echo e($transaction->created_at); ?></td>
								<td>
									<?php echo e($transaction->user->name); ?></br>
									<?php echo e($transaction->user->email); ?></br>
									<?php echo e($transaction->user->account_number); ?></br>
								</td>
								<td><?php echo e($transaction->currency->name); ?></td>
								<?php if($transaction->dr_cr == 'dr'): ?>
								<td><?php echo e(decimalPlace(($transaction->amount - $transaction->fee), currency($transaction->currency->name))); ?></td>
								<?php else: ?>
								<td><?php echo e(decimalPlace(($transaction->amount + $transaction->fee), currency($transaction->currency->name))); ?></td>
								<?php endif; ?>
								<td><?php echo e($transaction->dr_cr == 'dr' ? '+ '.decimalPlace($transaction->fee, currency($transaction->currency->name)) : '- '.decimalPlace($transaction->fee, currency($transaction->currency->name))); ?></td>
								<td><span class="<?php echo e($class); ?>"><?php echo e($symbol.' '.decimalPlace($transaction->amount, currency($transaction->currency->name))); ?></span></td>
								<td><?php echo e(strtoupper($transaction->dr_cr)); ?></td>
								<td><?php echo e(str_replace('_',' ',$transaction->type)); ?></td>
								<td><?php echo e($transaction->method); ?></td>
								<td><?php echo xss_clean(transaction_status($transaction->status)); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/dashboard-admin.blade.php ENDPATH**/ ?>