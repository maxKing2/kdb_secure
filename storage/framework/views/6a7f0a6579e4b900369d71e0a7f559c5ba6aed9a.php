<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header d-flex align-items-center">
				<span class="panel-title"><?php echo e(_lang('Wire Transfer Request')); ?></span>
				<select name="status" class="ml-auto select-filter filter-select">
					<option value="1"><?php echo e(_lang('Pending')); ?></option>
					<option value="2"><?php echo e(_lang('Approved')); ?></option>
					<option value="0"><?php echo e(_lang('Rejected')); ?></option>
				</select>
			</div>
			<div class="card-body">
				<table id="transfer_request_table" class="table table-bordered">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('User')); ?></th>
						    <th><?php echo e(_lang('AC Number')); ?></th>
							<th><?php echo e(_lang('Currency')); ?></th>
							<th><?php echo e(_lang('Amount')); ?></th>
							<th><?php echo e(_lang('Bank')); ?></th>
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
<script src="<?php echo e(asset('backend/assets/js/datatables/transfer_request.js?v=1.0')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/transfer_request/list.blade.php ENDPATH**/ ?>