<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title"><?php echo e(_lang('Update Translations')); ?></h4>
			</div>
			<div class="card-body">
				<form method="post" class="validate" autocomplete="off" action="<?php echo e(action('LanguageController@update', $id)); ?>">
					<?php echo csrf_field(); ?>
					<input name="_method" type="hidden" value="PATCH">
					<div class="row">
						<?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(ucwords($key)); ?></label>
								<input type="text" class="form-control" name="language[<?php echo e(str_replace(' ','_',$key)); ?>]" value="<?php echo e($lang); ?>" required>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="col-md-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Translation')); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/administration/language/edit.blade.php ENDPATH**/ ?>