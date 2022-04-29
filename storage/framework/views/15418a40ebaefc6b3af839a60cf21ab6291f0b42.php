<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex align-items-center">
                <h4 class="header-title"><?php echo e(ucwords(str_replace("_"," ",$status)).' '._lang('Users')); ?></h4>

                <div class="ml-auto">
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="userFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(ucwords(str_replace("_"," ",$status)).' '._lang('Users')); ?>

                        </button>

                        <div class="dropdown-menu" aria-labelledby="userFilter">
                            <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>"><?php echo e(_lang('All Users')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('users.filter')); ?>/email_verified"><?php echo e(_lang('Email Verified')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('users.filter')); ?>/email_unverified"><?php echo e(_lang('Email Unverified')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('users.filter')); ?>/sms_verified"><?php echo e(_lang('SMS Verified')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('users.filter')); ?>/sms_unverified"><?php echo e(_lang('SMS Unverified')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('users.filter')); ?>/inactive"><?php echo e(_lang('Inactive Users')); ?></a>
                        </div>
                    </div>

                    <a class="btn btn-primary btn-sm ajax-modal" data-title="<?php echo e(_lang('CREATE NEW USER')); ?>"
                        href="<?php echo e(route('users.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
                </div>
            </div>

            <div class="card-body">
                <table id="users_table" class="table table-bordered" data-status="<?php echo e($status); ?>">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th><?php echo e(_lang('AC Number')); ?></th>
                            <th><?php echo e(_lang('Name')); ?></th>
                            <th><?php echo e(_lang('Email')); ?></th>
                            <th><?php echo e(_lang('Phone')); ?></th>
                            <th><?php echo e(_lang('Status')); ?></th>
                            <th><?php echo e(_lang('Account Verified')); ?></th>
                            <th><?php echo e(_lang('Email Verified')); ?></th>
                            <th class="text-center"><?php echo e(_lang('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js-script'); ?>
<script src="<?php echo e(asset('backend/assets/js/datatables/users.js?v=1.0')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/user/list.blade.php ENDPATH**/ ?>