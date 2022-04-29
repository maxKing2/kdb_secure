<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header d-flex align-items-center">
				<span class="panel-title"><?php echo e(_lang('Deposit History')); ?></span>
				<a class="btn btn-primary btn-sm ml-auto" href="<?php echo e(route('deposits.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="deposits_table" class="table table-bordered">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Date')); ?></th>
						    <th><?php echo e(_lang('User')); ?></th>
						    <th><?php echo e(_lang('AC Number')); ?></th>
							<th><?php echo e(_lang('Amount')); ?></th>
							<th><?php echo e(_lang('Type')); ?></th>
							<th><?php echo e(_lang('Description')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
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
<script src="<?php echo e(asset('backend/assets/js/datatables/deposits.js?v=1.1')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/deposit/list.blade.php ENDPATH**/ ?>