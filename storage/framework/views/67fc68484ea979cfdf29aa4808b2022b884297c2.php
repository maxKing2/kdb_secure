<?php $__env->startSection('content'); ?>
<div class="row">
	<?php $settings = \App\Models\Setting::all(); ?>

	<div class="col-md-12">
        <div class="alert alert-info">
			<p><i class="icofont-info-circle"></i> <?php echo e(_lang('Fixed transfer fee & exchange fee will be in base currency and it will convert to other currency automatically based on exchange rate')); ?></p>
		</div>
        <div class="card">
            <div class="card-header">
                <h4 class="header-title"><?php echo e(_lang('Transactions Fee')); ?></h4>
            </div>

            <div class="card-body">
            <form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.system_settings')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(_lang('Transfer Fee Type')); ?></label>
                                <select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'transfer_fee_type', 'percentage')); ?>" name="transfer_fee_type">
                                    <option value="percentage"><?php echo e(_lang('Percentage')); ?></option>
                                    <option value="fixed"><?php echo e(_lang('Fixed')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(_lang('Transfer Fee')); ?></label>
                                <input type="text" class="form-control" name="transfer_fee" value="<?php echo e(get_setting($settings, 'transfer_fee',0)); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(_lang('Currency Exchange Fee Type')); ?></label>
                                <select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'exchange_fee_type','percentage')); ?>" name="exchange_fee_type">
                                    <option value="percentage"><?php echo e(_lang('Percentage')); ?></option>
                                    <option value="fixed"><?php echo e(_lang('Fixed')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(_lang('Currency Exchange Fee')); ?></label>
                                <input type="text" class="form-control" name="exchange_fee" value="<?php echo e(get_setting($settings, 'exchange_fee',0)); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/administration/general_settings/transactions_fee.blade.php ENDPATH**/ ?>