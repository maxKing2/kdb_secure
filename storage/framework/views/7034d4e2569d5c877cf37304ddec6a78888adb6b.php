<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<span class="panel-title"><?php echo e(_lang('Loan List')); ?></span>
				<div class="ml-auto">
					<select name="status" class="select-filter filter-select">
						<option value=""><?php echo e(_lang('All')); ?></option>
						<option value="0"><?php echo e(_lang('Pending')); ?></option>
						<option value="1"><?php echo e(_lang('Approved')); ?></option>
						<option value="2"><?php echo e(_lang('Completed')); ?></option>
					</select>
					<a class="btn btn-primary btn-sm" href="<?php echo e(route('loans.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
				</div>
			</div>

			<div class="card-body">
				<table id="loans_table" class="table table-bordered">
					<thead>
						<tr>
							<th><?php echo e(_lang('Loan ID')); ?></th>
							<th><?php echo e(_lang('Loan Product')); ?></th>
							<th><?php echo e(_lang('Borrower')); ?></th>
							<th><?php echo e(_lang('AC Number')); ?></th>
							<th><?php echo e(_lang('Release Date')); ?></th>
							<th><?php echo e(_lang('Applied Amount')); ?></th>
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
<script src="<?php echo e(asset('backend/assets/js/datatables/loans.js?v=1.0')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/loan/list.blade.php ENDPATH**/ ?>