<form method="post" class="ajax-screen-submit" autocomplete="off" action="<?php echo e(action('ServiceController@update', $id)); ?>" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<input name="_method" type="hidden" value="PATCH">
	<div class="row px-2">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('ICON')); ?></label>
				<a href="https://icofont.com/icons" class="float-right" target="_blank"><?php echo e(_lang('BROWSE ICONS')); ?></a>
				<input type="text" class="form-control" name="icon" value="<?php echo e($service->icon); ?>" required>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Title')); ?></label>
				<input type="text" class="form-control" name="trans[title]" value="<?php echo e($service->translation->title); ?>" required>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Body')); ?></label>
				<textarea class="form-control" name="trans[body]"><?php echo e($service->translation->body); ?></textarea>
			</div>
		</div>


		<div class="form-group">
		    <div class="col-md-12">
			    <button type="submit" class="btn btn-primary btn-lg"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update')); ?></button>
		    </div>
		</div>
	</div>
</form>

<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/website_management/service/modal/edit.blade.php ENDPATH**/ ?>