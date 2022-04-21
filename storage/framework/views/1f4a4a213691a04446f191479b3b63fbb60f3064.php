<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<span class="panel-title"><?php echo e(_lang('Loan Products')); ?></span>
				<a class="btn btn-primary btn-sm float-right" href="<?php echo e(route('loan_products.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="loan_products_table" class="table table-bordered data-table">
					<thead>
						<tr>
							<th><?php echo e(_lang('Name')); ?></th>
							<th><?php echo e(_lang('Interest Rate')); ?></th>
							<th><?php echo e(_lang('Interest Type')); ?></th>
							<th><?php echo e(_lang('Term')); ?></th>
							<th><?php echo e(_lang('Term Period')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $loanproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr data-id="row_<?php echo e($loanproduct->id); ?>">
							<td class='name'><?php echo e($loanproduct->name); ?></td>
							<td class='interest_rate'><?php echo e($loanproduct->interest_rate.' %'); ?></td>
							<td class='interest_type'><?php echo e(ucwords(str_replace("_"," ", $loanproduct->interest_type))); ?></td>
							<td class='term'><?php echo e($loanproduct->term); ?></td>
							<td class='term_period'>
								<?php if($loanproduct->term_period === '+1 month'): ?>
									<?php echo e(_lang('Month')); ?>

								<?php elseif($loanproduct->term_period === '+1 year'): ?>
									<?php echo e(_lang('Year')); ?>

								<?php elseif($loanproduct->term_period === '+1 day'): ?>
									<?php echo e(_lang('Day')); ?>

								<?php elseif($loanproduct->term_period === '+1 week'): ?>
									<?php echo e(_lang('Week')); ?>

								<?php endif; ?>
							</td>

							<td class="text-center">
								<div class="dropdown">
									<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo e(_lang('Action')); ?>

									</button>
									<form action="<?php echo e(action('LoanProductController@destroy', $loanproduct['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('LoanProductController@edit', $loanproduct['id'])); ?>" class="dropdown-item dropdown-edit dropdown-edit"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<button class="btn-remove dropdown-item" type="submit"><i class="icofont-trash"></i> <?php echo e(_lang('Delete')); ?></button>
									</div>
									</form>
								</div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/loan_product/list.blade.php ENDPATH**/ ?>