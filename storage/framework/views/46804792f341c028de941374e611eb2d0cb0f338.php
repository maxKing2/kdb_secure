<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header text-center">
				<?php echo e(_lang('Change Tele Banking Pin')); ?>

			</div>

			<div class="card-body">
				<form action="<?php echo e(route('profile.update_tele_bank_pin')); ?>" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<?php echo csrf_field(); ?>
					<div class="row">
						

						<div class="col-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('New Pin')); ?></label>
								<input type="text" class="form-control" name="pin" required>
							</div>
						</div>

					

						<div class="col-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update Pin')); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/profile/change_tele_banking_pin.blade.php ENDPATH**/ ?>