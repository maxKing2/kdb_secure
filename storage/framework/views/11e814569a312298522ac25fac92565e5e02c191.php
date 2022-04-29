
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header text-center">
				<?php echo e(_lang('Profile Settings')); ?>

			</div>
			<div class="card-body">

				<form action="<?php echo e(route('profile.update')); ?>" autocomplete="off" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Name')); ?></label>
								<input type="text" class="form-control" name="name" value="<?php echo e($profile->name); ?>" required>
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Email')); ?></label>
								<input type="text" class="form-control" name="email" value="<?php echo e($profile->email); ?>" required>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Country Code')); ?></label>
								<select class="form-control select2 auto-select" data-selected="<?php echo e($profile->country_code); ?>" name="country_code" required>
									<option value=""><?php echo e(_lang('Select One')); ?></option>
									<?php $__currentLoopData = get_country_codes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($value['dial_code']); ?>"><?php echo e($value['country'].' (+'.$value['dial_code'].')'); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Phone')); ?></label>
								<input type="text" class="form-control" name="phone" value="<?php echo e($profile->phone); ?>" required>
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
								<label class="control-label"><?php echo e(_lang('Image')); ?> (300 X 300)</label>
								<input type="file" class="form-control dropify" data-default-file="<?php echo e($profile->profile_picture != "" ? asset('uploads/profile/'.$profile->profile_picture) : ''); ?>" name="profile_picture" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update Profile')); ?></button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/profile/profile_edit.blade.php ENDPATH**/ ?>