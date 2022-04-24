

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title"><?php echo e(_lang('New Deposit Method')); ?></h4>
			</div>
			<div class="card-body">
			    <form method="post" class="validate" autocomplete="off" action="<?php echo e(route('deposit_methods.store')); ?>" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Name')); ?></label>
								<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Image')); ?></label>
								<input type="file" class="form-control dropify" name="image" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Currency')); ?></label>
								<select class="form-control auto-select select2" data-selected="<?php echo e(old('currency_id')); ?>" name="currency_id" required>
									<option value=""><?php echo e(_lang('Select One')); ?></option>
									<?php echo e(create_option('currency','id','name','',array('status=' => 1))); ?>

								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Status')); ?></label>
								<select class="form-control auto-select" data-selected="<?php echo e(old('status')); ?>" name="status">
									<option value=""><?php echo e(_lang('Select One')); ?></option>
									<option value="1"><?php echo e(_lang('Active')); ?></option>
									<option value="0"><?php echo e(_lang('Deactivate')); ?></option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Minimum Amount')); ?></label>
								<input type="text" class="form-control float-field" name="minimum_amount" value="<?php echo e(old('minimum_amount')); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Maximum Amount')); ?></label>
								<input type="text" class="form-control float-field" name="maximum_amount" value="<?php echo e(old('maximum_amount')); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Fixed Charge')); ?></label>
								<input type="text" class="form-control" name="fixed_charge" value="<?php echo e(old('fixed_charge',0)); ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Charge In Percentage')); ?></label>
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="charge_in_percentage" value="<?php echo e(old('charge_in_percentage',0)); ?>" required>
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Descriptions')); ?></label>
								<textarea class="form-control" name="descriptions"><?php echo e(old('descriptions')); ?></textarea>
							</div>
						</div>


						<div class="col-md-12 mt-3">
							<div class="d-flex align-items-center">
								<h5><b><?php echo e(_lang('Deposit Informations')); ?></b></h5>
								<button type="button" id="add_row" class="btn btn-outline-primary btn-sm ml-auto"><i class="icofont-plus"></i> <?php echo e(_lang('Add New Field')); ?></button>
							</div>
							<hr>
							<div class="row" id="custom_fields">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Field Name')); ?></label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="requirements[]" placeholder="EX: Transaction ID" required>
											<div class="input-group-append">
												<button class="btn btn-danger btn-sm" id="remove_field"><i class="icofont-trash"></i></button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Field Name')); ?></label>
										<div class="input-group mb-3">
											<input type="text" class="form-control" name="requirements[]" placeholder="EX: Reference Number" required>
											<div class="input-group-append">
												<button class="btn btn-danger btn-sm" id="remove_field"><i class="icofont-trash"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12 mt-2">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save')); ?></button>
							</div>
						</div>
					</div>
			    </form>
			</div>
		</div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>
<script>
(function ($) {
  "use strict";

	$(document).on('click','#add_row', function(){
		$("#custom_fields").append(`<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('Field Name')); ?></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="requirements[]" required>
												<div class="input-group-append">
													<button class="btn btn-danger btn-sm" id="remove_field"><i class="icofont-trash"></i></button>
												</div>
											</div>
										</div>
									</div>`);
	});

	$(document).on('click','#remove_field', function(){
		$(this).closest('.col-md-6').remove();
	});
})(jQuery);
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/deposit_method/create.blade.php ENDPATH**/ ?>