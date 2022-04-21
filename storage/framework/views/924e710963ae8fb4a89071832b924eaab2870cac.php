<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header">
				<span class="panel-title"><?php echo e(_lang('Other Banks')); ?></span>
				<a class="btn btn-primary btn-sm float-right ajax-modal" data-title="<?php echo e(_lang('Add New Bank')); ?>" href="<?php echo e(route('other_banks.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="other_banks_table" class="table table-bordered data-table">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Name')); ?></th>
							<th><?php echo e(_lang('Swift Code')); ?></th>
							<th><?php echo e(_lang('Currency')); ?></th>
							<th><?php echo e(_lang('Minimum Transfer')); ?></th>
							<th><?php echo e(_lang('Maximum Transfer')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php $__currentLoopData = $otherbanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherbank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr data-id="row_<?php echo e($otherbank->id); ?>">
							<td class='name'><?php echo e($otherbank->name); ?></td>
							<td class='swift_code'><?php echo e($otherbank->swift_code); ?></td>
							<td class='bank_currency'><?php echo e($otherbank->currency->name); ?></td>
							<td class='minimum_transfer_amount'><?php echo e($otherbank->minimum_transfer_amount); ?></td>
							<td class='maximum_transfer_amount'><?php echo e($otherbank->maximum_transfer_amount); ?></td>
							<td class='status'><?php echo xss_clean(status($otherbank->status)); ?></td>

							<td class="text-center">
								<span class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo e(_lang('Action')); ?>

								  </button>
								  <form action="<?php echo e(action('OtherBankController@destroy', $otherbank['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('OtherBankController@edit', $otherbank['id'])); ?>" data-title="<?php echo e(_lang('Update Bank Details')); ?>" class="dropdown-item dropdown-edit ajax-modal"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<a href="<?php echo e(action('OtherBankController@show', $otherbank['id'])); ?>" data-title="<?php echo e(_lang('Bank Details')); ?>" class="dropdown-item dropdown-view ajax-modal"><i class="icofont-eye-alt"></i> <?php echo e(_lang('View')); ?></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/other_bank/list.blade.php ENDPATH**/ ?>