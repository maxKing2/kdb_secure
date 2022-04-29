<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card no-export">
		    <div class="card-header d-flex align-items-center">
				<span class="panel-title"><?php echo e(_lang('Pages')); ?></span>
				<?php if(has_permission('pages.create')): ?>
				<a class="btn btn-primary btn-sm ml-auto" href="<?php echo e(route('pages.create')); ?>"><i class="icofont-plus-circle"></i> <?php echo e(_lang('Add New')); ?></a>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<table id="pages_table" class="table table-bordered data-table">
					<thead>
					    <tr>
						    <th><?php echo e(_lang('Title')); ?></th>
							<th><?php echo e(_lang('Status')); ?></th>
							<th><?php echo e(_lang('Created')); ?></th>
							<th class="text-center"><?php echo e(_lang('Action')); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr data-id="row_<?php echo e($page->id); ?>">
							<td class='title'><?php echo e($page->translation->title); ?></td>
							<td class='status'><?php echo xss_clean(status($page->status)); ?></td>
							<td class='created_at'><?php echo e($page->created_at); ?></td>

							<td class="text-center">
								<div class="dropdown">
								  <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo e(_lang('Action')); ?>

								  <i class="fas fa-angle-down"></i>
								  </button>
								  <form action="<?php echo e(action('PageController@destroy', $page['id'])); ?>" method="post">
									<?php echo e(csrf_field()); ?>

									<input name="_method" type="hidden" value="DELETE">

									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="<?php echo e(action('PageController@edit', $page['id'])); ?>" class="dropdown-item dropdown-edit dropdown-edit"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Edit')); ?></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/website_management/page/list.blade.php ENDPATH**/ ?>