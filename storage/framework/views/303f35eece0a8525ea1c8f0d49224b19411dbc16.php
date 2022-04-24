<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<span class="panel-title"><?php echo e(_lang('Transactions Report')); ?></span>
			</div>

			<div class="card-body">

				<div class="report-params">
					<form class="validate" method="post" action="<?php echo e(route('customer_reports.transactions_report')); ?>">
						<div class="row">
              				<?php echo e(csrf_field()); ?>


							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label"><?php echo e(_lang('Start Date')); ?></label>
									<input type="text" class="form-control datepicker" name="date1" id="date1" value="<?php echo e(isset($date1) ? $date1 : old('date1')); ?>" readOnly="true" required>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label"><?php echo e(_lang('End Date')); ?></label>
									<input type="text" class="form-control datepicker" name="date2" id="date2" value="<?php echo e(isset($date2) ? $date2 : old('date2')); ?>" readOnly="true" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Transaction Type')); ?></label>
									<select class="form-control auto-select" data-selected="<?php echo e(isset($transaction_type) ? $transaction_type : old('transaction_type')); ?>" name="transaction_type">
										<option value=""><?php echo e(_lang('All')); ?></option>
										<option value="Deposit"><?php echo e(_lang('Deposit')); ?></option>
										<option value="Withdraw"><?php echo e(_lang('Withdraw')); ?></option>
										<option value="Wire_Transfer"><?php echo e(_lang('Wire Transfer')); ?></option>
										<option value="Payment"><?php echo e(_lang('Payment')); ?></option>
										<option value="Loan"><?php echo e(_lang('Loan')); ?></option>
                                        <option value="Loan_Repayment"><?php echo e(_lang('Loan Repayment')); ?></option>
										<option value="Exchange"><?php echo e(_lang('Exchange')); ?></option>
										<option value="Fixed_Deposit"><?php echo e(_lang('Fixed Deposit')); ?></option>
									</select>
								</div>
							</div>

                            <div class="col-md-3">
								<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Status')); ?></label>
									<select class="form-control auto-select" data-selected="<?php echo e(isset($status) ? $status : old('status')); ?>" name="status">
										<option value=""><?php echo e(_lang('All')); ?></option>
										<option value="1"><?php echo e(_lang('Pending')); ?></option>
										<option value="2"><?php echo e(_lang('Completed')); ?></option>
										<option value="0"><?php echo e(_lang('Cancelled')); ?></option>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<button type="submit" class="btn btn-light btn-sm btn-block mt-26"><i class="icofont-filter"></i> <?php echo e(_lang('Filter')); ?></button>
							</div>
						</form>

					</div>
				</div><!--End Report param-->

				<?php $date_format = get_option('date_format','Y-m-d'); ?>
				<?php $currency = currency(); ?>

				<div class="report-header">
				   <h4><?php echo e(_lang('Transactions Report')); ?></h4>
				   <h5><?php echo e(isset($date1) ? date($date_format, strtotime($date1)).' '._lang('to').' '.date($date_format, strtotime($date2)) : '----------  '._lang('to').'  ----------'); ?></h5>
				</div>

				<table class="table table-bordered report-table">
					<thead>
                        <th><?php echo e(_lang('Date')); ?></th>
                        <th><?php echo e(_lang('Currency')); ?></th>
                        <th><?php echo e(_lang('Amount')); ?></th>
                        <th><?php echo e(_lang('Charge')); ?></th>
                        <th><?php echo e(_lang('Grand Total')); ?></th>
                        <th><?php echo e(_lang('DR/CR')); ?></th>
                        <th><?php echo e(_lang('Type')); ?></th>
                        <th><?php echo e(_lang('Status')); ?></th>
                        <th class="text-center"><?php echo e(_lang('Details')); ?></th>
					</thead>
					<tbody>
					<?php if(isset($report_data)): ?>
						<?php $__currentLoopData = $report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
								<td><?php echo xss_clean(transaction_status($transaction->status)); ?></td>
								<td class="text-center"><a href="<?php echo e(route('transaction_details', $transaction->id)); ?>" data-title="<?php echo e(_lang('Transaction Details')); ?>" class="btn btn-outline-primary btn-sm ajax-modal"><?php echo e(_lang('View')); ?></a></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/customer_portal/reports/all_transactions.blade.php ENDPATH**/ ?>