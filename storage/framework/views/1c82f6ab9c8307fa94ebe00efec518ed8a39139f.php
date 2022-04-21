<?php $__env->startSection('content'); ?>
	<?php if(Auth::user()->user_type == 'customer' && Auth::user()->document_verified_at == null && get_option('enable_kyc') == 'yes'): ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-danger">
					<strong><i class="mdi mdi-information-outline"></i> <?php echo e(_lang('Your account is not verified. Please submit all necessary documents')); ?>. <a href="<?php echo e(route('profile.document_verification')); ?>"><?php echo e(_lang('Submit Documents')); ?> </a></strong>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-xl-12">
			<div class="card mb-4">
				<div class="card-body">
					<h6><?php echo e(_lang('Account Number')); ?></h6>
					<h6 class="pt-1"><b><?php echo e(Auth::user()->account_number); ?></b></h6>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<?php $__currentLoopData = $account_balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-md">
			<div class="card mb-4">
				<div class="card-body">
					<h6><?php echo e($currency->name.' '._lang('Balance')); ?></h6>
					<h6 class="pt-1"><b><?php echo e(decimalPlace($currency->balance, currency($currency->name))); ?></b></h6>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<div class="row">

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100 border-bottom-card border-danger">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h6><?php echo e(_lang('Active Loans')); ?></h6>
							<h6 class="pt-1 mb-0"><b><?php echo e($loans->count()); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('loans.my_loans')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6  mb-4">
			<div class="card h-100 border-bottom-card border-info">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h6><?php echo e(_lang('Payment Requests')); ?></h6>
							<h6 class="pt-1 mb-0"><b><?php echo e($payment_request); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('payment_requests.index')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6  mb-4">
			<div class="card h-100 border-bottom-card border-success">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h6><?php echo e(_lang('Active Fixed Deposits')); ?></h6>
							<h6 class="pt-1 mb-0"><b><?php echo e($active_fdr); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('fixed_deposits.history')); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6  mb-4">
			<div class="card h-100 border-bottom-card border-info">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-grow-1">
							<h6><?php echo e(_lang('Active Tickets')); ?></h6>
							<h6 class="pt-1 mb-0"><b><?php echo e($active_tickets); ?></b></h6>
						</div>
						<div>
							<a href="<?php echo e(route('tickets.my_tickets',['status' => 'active'])); ?>"><i class="icofont-arrow-right"></i><?php echo e(_lang('View')); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header">
					<?php echo e(_lang('Up Comming Loan Payment')); ?>

				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th><?php echo e(_lang('Loan ID')); ?></th>
								<th><?php echo e(_lang('Next Payment Date')); ?></th>
								<th><?php echo e(_lang('Status')); ?></th>
								<th class="text-right"><?php echo e(_lang('Amount to Pay')); ?></th>
								<th class="text-center"><?php echo e(_lang('Action')); ?></th>
							</thead>
							<tbody>
								<?php if(count($loans) == 0): ?>
									<tr>
										<td colspan="5"><h6 class="text-center"><?php echo e(_lang('No Active Loan Available')); ?></h6></td>
									</tr>
								<?php endif; ?>

								<?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($loan->loan_id); ?></td>
									<td><?php echo e($loan->next_payment->repayment_date); ?></td>
									<td><?php echo $loan->next_payment->repayment_date >= date('Y-m-d') ? xss_clean(show_status(_lang('Upcoming'),'success')) : xss_clean(show_status(_lang('Due'),'danger')); ?></td>
									<td class="text-right"><?php echo e(decimalPlace($loan->next_payment->amount_to_pay, currency($loan->currency->name))); ?></td>
									<td class="text-center"><a href="<?php echo e(route('loans.loan_payment',$loan->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(_lang('Pay Now')); ?></a></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
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
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/dashboard-customer.blade.php ENDPATH**/ ?>