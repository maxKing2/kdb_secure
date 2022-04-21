<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<span class="panel-title"><?php echo e(_lang('Update Loan Product')); ?></span>
			</div>
			<div class="card-body">
				<form method="post" class="validate" autocomplete="off" action="<?php echo e(action('LoanProductController@update', $id)); ?>" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<input name="_method" type="hidden" value="PATCH">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Name')); ?></label>
								<input type="text" class="form-control" name="name" value="<?php echo e($loanproduct->name); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Minimum Amount').' '.currency()); ?></label>
								<input type="text" class="form-control float-field" name="minimum_amount" value="<?php echo e($loanproduct->minimum_amount); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Maximum Amount').' '.currency()); ?></label>
								<input type="text" class="form-control float-field" name="maximum_amount" value="<?php echo e($loanproduct->maximum_amount); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Interest Rate Per Year')); ?></label>
								<input type="text" class="form-control float-field" name="interest_rate" value="<?php echo e($loanproduct->interest_rate); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Interest Type')); ?></label>
								<select class="form-control auto-select" data-selected="<?php echo e($loanproduct->interest_type); ?>" name="interest_type" required>
									<option value="flat_rate"><?php echo e(_lang('Flat Rate')); ?></option>
									<option value="fixed_rate"><?php echo e(_lang('Fixed Rate')); ?></option>
									<option value="mortgage"><?php echo e(_lang('Mortgage amortization')); ?></option>
									<option value="one_time"><?php echo e(_lang('One-time payment')); ?></option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Term')); ?></label>
								<input type="number" class="form-control" name="term" value="<?php echo e($loanproduct->term); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Term Period')); ?></label>
								<select class="form-control auto-select" data-selected="<?php echo e($loanproduct->term_period); ?>" name="term_period" id="term_period" required>
									<option value=""><?php echo e(_lang('Select One')); ?></option>
									<option value="+1 day"><?php echo e(_lang('Day')); ?></option>
									<option value="+1 week"><?php echo e(_lang('Week')); ?></option>
									<option value="+1 month"><?php echo e(_lang('Month')); ?></option>
									<option value="+1 year"><?php echo e(_lang('Year')); ?></option>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Status')); ?></label>
								<select class="form-control auto-select" data-selected="<?php echo e($loanproduct->status); ?>" name="status" required>
									<option value=""><?php echo e(_lang('Select One')); ?></option>
									<option value="1"><?php echo e(_lang('Active')); ?></option>
									<option value="0"><?php echo e(_lang('Deactivate')); ?></option>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Description')); ?></label>
								<textarea class="form-control" name="description"><?php echo e($loanproduct->description); ?></textarea>
							</div>
						</div>


						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update Changes')); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/loan_product/edit.blade.php ENDPATH**/ ?>