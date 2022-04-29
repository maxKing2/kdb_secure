<form method="post" class="ajax-screen-submit" autocomplete="off" action="<?php echo e(action('UserController@update', $id)); ?>" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<input name="_method" type="hidden" value="PATCH">

	<div class="row p-2">
		<div class="col-md-6">
			<div class="form-group">
			   <label class="control-label"><?php echo e(_lang('Name')); ?></label>
			   <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
			   <label class="control-label"><?php echo e(_lang('Email')); ?></label>
			   <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Account Number')); ?></label>
				<input type="text" class="form-control" name="account_number" value="<?php echo e($user->account_number); ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
			   <label class="control-label"><?php echo e(_lang('Password')); ?></label>
			   <input type="password" class="form-control" name="password" value="">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Country Code')); ?></label>
				<select class="form-control select2 auto-select" data-selected="<?php echo e($user->country_code); ?>" name="country_code" required>
					<option value=""><?php echo e(_lang('Select One')); ?></option>
					<?php $__currentLoopData = get_country_codes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($value['dial_code']); ?>"><?php echo e($value['country'].' (+'.$value['dial_code'].')'); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Phone')); ?></label>
				<input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Branch')); ?></label>
				<select class="form-control select2 auto-select" data-selected="<?php echo e($user->branch_id); ?>" name="branch_id">
					<option value=""><?php echo e(_lang('Select One')); ?></option>
					<?php echo e(create_option('branches','id','name')); ?>

				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Status')); ?></label>
				<select class="form-control select2 auto-select" data-selected="<?php echo e($user->status); ?>" name="status" required>
					<option value=""><?php echo e(_lang('Select One')); ?></option>
					<option value="1"><?php echo e(_lang('Active')); ?></option>
					<option value="0"><?php echo e(_lang('In Active')); ?></option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Email Verified')); ?></label>
				<select class="form-control select2 auto-select" data-selected="<?php echo e($user->email_verified_at); ?>" name="email_verified_at">
					<option value=""><?php echo e(_lang('No')); ?></option>
					<option value="<?php echo e($user->email_verified_at != null ? $user->email_verified_at : now()); ?>"><?php echo e(_lang('Yes')); ?></option>
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('SMS Verified')); ?></label>
				<select class="form-control select2 auto-select" data-selected="<?php echo e($user->sms_verified_at); ?>" name="sms_verified_at">
					<option value=""><?php echo e(_lang('No')); ?></option>
					<option value="<?php echo e($user->sms_verified_at != null ? $user->sms_verified_at : now()); ?>"><?php echo e(_lang('Yes')); ?></option>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Withdraw Money')); ?></label>
				<select class="form-control auto-select" data-selected="<?php echo e($user->allow_withdrawal); ?>" name="allow_withdrawal" required>
					<option value="1"><?php echo e(_lang('Allowed')); ?></option>
					<option value="0"><?php echo e(_lang('Not Allowed')); ?></option>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
			   <label class="control-label"><?php echo e(_lang('Profile Picture')); ?></label>
			   <input type="file" class="form-control dropify" name="profile_picture">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update')); ?></button>
			</div>
		</div>
	</div>
</form><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/user/modal/edit.blade.php ENDPATH**/ ?>