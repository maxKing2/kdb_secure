

<?php $__env->startSection('content'); ?>

<?php $date_format = get_option('date_format','Y-m-d'); ?>

<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header text-center">
				<?php echo e(_lang('My Profile Overview')); ?>

			</div>

			<div class="card-body">
				<table class="table table-bordered" width="100%">
					<tbody>
						<tr class="text-center">
							<td colspan="2"><img class="thumb-image-sm img-thumbnail" src="<?php echo e(profile_picture($profile->profile_picture)); ?>"></td>
						</tr>
							<tr>
								<td><?php echo e(_lang('Name')); ?></td>
								<td><?php echo e($profile->name); ?></td>
							</tr>
							<tr>
								<td><?php echo e(_lang('Email')); ?></td>
								<td><?php echo e($profile->email); ?></td>
							</tr>

							<?php if($profile->user_type != 'customer'): ?>
							<tr>
								<td><?php echo e(_lang('User Type')); ?></td>
								<td><?php echo e(ucwords($profile->user_type)); ?></td>
							</tr>
							<?php endif; ?>

							<?php if($profile->user_type == 'customer'): ?>
							<tr>
								<td><?php echo e(_lang('Account Number')); ?></td>
								<td><b><?php echo e($profile->account_number); ?></b></td>
							</tr>
							<tr>
								<td><?php echo e(_lang('Phone')); ?></td>
								<td><?php echo e('+'.$profile->country_code.$profile->phone); ?></td>
							</tr>
							<tr>
								<td><?php echo e(_lang('Branch')); ?></td>
								<td><?php echo e($profile->branch->name); ?></td>
							</tr>
							<tr>
								<td><?php echo e(_lang('Email Verified')); ?></td>
								<td><?php echo $profile->email_verified_at != null ? xss_clean(show_status(_lang('Yes'), 'primary')) : xss_clean(show_status(_lang('No'), 'danger')); ?></td>
							</tr>
							<tr>
								<td><?php echo e(_lang('Mobile Verified')); ?></td>
								<td><?php echo $profile->sms_verified_at != null ? xss_clean(show_status(_lang('Yes'), 'primary')) : xss_clean(show_status(_lang('No'), 'danger')); ?></td>
							</tr>
							<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/profile/profile_view.blade.php ENDPATH**/ ?>