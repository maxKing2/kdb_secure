<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title"><?php echo e(_lang('Create New Language')); ?></h4>
			</div>
			<div class="card-body">
				<form method="post" class="validate" autocomplete="off" action="<?php echo e(route('languages.store')); ?>" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Language Name')); ?></label>
								<input type="text" class="form-control" name="language_name" value="<?php echo e(old('language_name')); ?>" required>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><?php echo e(_lang('Create Language')); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/administration/language/create.blade.php ENDPATH**/ ?>