<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header">
				<span class="panel-title"><?php echo e(_lang('FDR Plans')); ?></span>
				<a class="btn btn-primary btn-sm float-right ajax-modal" data-title="<?php echo e(_lang('Add New Plan')); ?>" href="<?php echo e(route('fdr_plans.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="fdr_plans_table" class="table table-bordered data-table">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Name')); ?></th>
							<th><?php echo e(_lang('Minimum Amount')); ?></th>
							<th><?php echo e(_lang('Maximum Amount')); ?></th>
							<th><?php echo e(_lang('Interest Rate')); ?></th>
							<th><?php echo e(_lang('Duration')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php $__currentLoopData = $fdrplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fdrplan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr data-id="row_<?php echo e($fdrplan->id); ?>">
							<td class='name'><?php echo e($fdrplan->name); ?></td>
							<td class='minimum_amount'><?php echo e(decimalPlace($fdrplan->minimum_amount, currency())); ?></td>
							<td class='maximum_amount'><?php echo e(decimalPlace($fdrplan->maximum_amount, currency())); ?></td>
							<td class='interest_rate'><?php echo e($fdrplan->interest_rate.' %'); ?></td>
							<td class='duration'><?php echo e($fdrplan->duration.' '.ucwords($fdrplan->duration_type)); ?></td>
							<td class='status'><?php echo xss_clean(status($fdrplan->status)); ?></td>

							<td class="text-center">
								<span class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo e(_lang('Action')); ?>

								  </button>
								  <form action="<?php echo e(action('FDRPlanController@destroy', $fdrplan['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('FDRPlanController@edit', $fdrplan['id'])); ?>" data-title="<?php echo e(_lang('Update Plan')); ?>" class="dropdown-item dropdown-edit ajax-modal"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<a href="<?php echo e(action('FDRPlanController@show', $fdrplan['id'])); ?>" data-title="<?php echo e(_lang('Plan Details')); ?>" class="dropdown-item dropdown-view ajax-modal"><i class="icofont-eye-alt"></i> <?php echo e(_lang('View')); ?></a>
										<button class="btn-remove dropdown-item" type="submit"><i class="icofont-trash"></i> <?php echo e(_lang('Delete')); ?></button>
									</div>
								  </form>
								</span>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/fdr_plan/list.blade.php ENDPATH**/ ?>