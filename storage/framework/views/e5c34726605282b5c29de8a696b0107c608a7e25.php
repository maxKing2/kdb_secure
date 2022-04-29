<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header d-flex align-items-center">
				<span class="panel-title"><?php echo e(_lang('Services')); ?></span>
				<a class="btn btn-primary btn-sm ml-auto ajax-modal" data-title="<?php echo e(_lang('Add New Service')); ?>" href="<?php echo e(route('services.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
			</div>
			<div class="card-body">
				<table id="services_table" class="table table-bordered data-table">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Title')); ?></th>
						    <th><?php echo e(_lang('Content')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr data-id="row_<?php echo e($service->id); ?>">
							<td class='title'><?php echo e($service->translation->title); ?></td>
							<td class='body'><?php echo e($service->translation->body); ?></td>

							<td class="text-center">
								<span class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo e(_lang('Action')); ?>

								  </button>
								  <form action="<?php echo e(action('ServiceController@destroy', $service['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('ServiceController@edit', $service['id'])); ?>" data-title="<?php echo e(_lang('Update Service')); ?>" class="dropdown-item dropdown-edit ajax-modal"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
										<a href="<?php echo e(action('ServiceController@show', $service['id'])); ?>" data-title="<?php echo e(_lang('Service Details')); ?>" class="dropdown-item dropdown-view ajax-modal"><i class="icofont-eye-alt"></i> <?php echo e(_lang('View')); ?></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/website_management/service/list.blade.php ENDPATH**/ ?>