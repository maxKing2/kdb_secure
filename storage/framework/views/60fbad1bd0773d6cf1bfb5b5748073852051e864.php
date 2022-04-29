<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-info">
			<p><i class="icofont-info-circle"></i> <?php echo e(_lang('Base Currency exchange rate always 1.00')); ?></p>
		</div>
		<div class="card no-export">
		    <div class="card-header">
				<span class="panel-title"><?php echo e(_lang('Currency List')); ?></span>
				<a class="btn btn-primary btn-sm float-right ajax-modal" data-title="<?php echo e(_lang('Add New Currency')); ?>" href="<?php echo e(route('currency.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="currency_table" class="table table-bordered data-table">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Name')); ?></th>
							<th><?php echo e(_lang('Exchange Rate')); ?></th>
							<th><?php echo e(_lang('Base Currency')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php $__currentLoopData = $currencys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr data-id="row_<?php echo e($currency->id); ?>">
							<td class='name'><?php echo e($currency->name); ?></td>
							<td class='exchange_rate'><?php echo e($currency->exchange_rate); ?></td>
							<td class='base_currency'><?php echo $currency->base_currency == 1 ? xss_clean(show_status(_lang('Yes'),'success')) : xss_clean(show_status(_lang('No'),'danger')); ?></td>
							<td class='status'><?php echo xss_clean(status($currency->status)); ?></td>

							<td class="text-center">
								<span class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo e(_lang('Action')); ?>

								  </button>
								  <?php if($currency->base_currency == 0 ): ?>
								  <form action="<?php echo e(action('CurrencyController@destroy', $currency['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('CurrencyController@edit', $currency['id'])); ?>" data-title="<?php echo e(_lang('Update Currency')); ?>" class="dropdown-item dropdown-edit ajax-modal"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<a href="<?php echo e(action('CurrencyController@show', $currency['id'])); ?>" data-title="<?php echo e(_lang('Currency Details')); ?>" class="dropdown-item dropdown-view ajax-modal"><i class="icofont-eye-alt"></i> <?php echo e(_lang('View')); ?></a>
										<button class="btn-remove dropdown-item" type="submit"><i class="icofont-trash"></i> <?php echo e(_lang('Delete')); ?></button>
									</div>
								  </form>
								  <?php else: ?>
								  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('CurrencyController@edit', $currency['id'])); ?>" data-title="<?php echo e(_lang('Update Currency')); ?>" class="dropdown-item dropdown-edit ajax-modal"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<a href="<?php echo e(action('CurrencyController@show', $currency['id'])); ?>" data-title="<?php echo e(_lang('Currency Details')); ?>" class="dropdown-item dropdown-view ajax-modal"><i class="icofont-eye-alt"></i> <?php echo e(_lang('View')); ?></a>
									</div>
								  <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/currency/list.blade.php ENDPATH**/ ?>