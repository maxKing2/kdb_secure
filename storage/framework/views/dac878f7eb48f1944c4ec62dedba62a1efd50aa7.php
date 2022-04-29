<form method="post" class="ajax-screen-submit" autocomplete="off" action="<?php echo e(action('FaqController@update', $id)); ?>" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<input name="_method" type="hidden" value="PATCH">
	<div class="row px-2">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Question')); ?></label>
				<input type="text" class="form-control" name="trans[question]" value="<?php echo e($faq->translation->question); ?>" required>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Answer')); ?></label>
				<textarea class="form-control" rows="6" name="trans[answer]" required><?php echo e($faq->translation->answer); ?></textarea>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label"><?php echo e(_lang('Status')); ?></label>
				<select class="form-control auto-select" data-selected="<?php echo e($faq->status); ?>" name="status" required>
					<option value="1"><?php echo e(_lang('Active')); ?></option>
					<option value="0"><?php echo e(_lang('Deactive')); ?></option>
				</select>
			</div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
			    <button type="submit" class="btn btn-primary btn-lg"><i class="icofont-check-circled"></i> <?php echo e(_lang('Update')); ?></button>
		    </div>
		</div>
	</div>
</form>

<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/website_management/faq/modal/edit.blade.php ENDPATH**/ ?>