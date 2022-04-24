<form method="post" class="ajax-screen-submit" autocomplete="off" action="<?php echo e(route('deposit.manual_deposit',$deposit_method->id)); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="row p-2">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(_lang('Amount')); ?></label>
                <input type="text" class="form-control float-field" name="amount" value="<?php echo e(old('amount')); ?>" required>
            </div>
        </div>

        <?php $__currentLoopData = $deposit_method->requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label"><?php echo e($requirement); ?></label>
                <input type="text" class="form-control" name="requirements[<?php echo e(str_replace(' ','_',$requirement)); ?>]" required>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($deposit_method->descriptions != ''): ?>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(_lang('Instructions')); ?></label>
                <div class="border rounded"><?php echo xss_clean($deposit_method->descriptions); ?></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(_lang('Description')); ?></label>
                <textarea class="form-control" name="description"><?php echo e(old('description')); ?></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo e(_lang('Attachment')); ?></label>
                <input type="file" class="form-control dropify" name="attachment">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icofont-check-circled"></i> <?php echo e(_lang('Submit')); ?></button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/customer_portal/deposit/modal/manual_deposit.blade.php ENDPATH**/ ?>