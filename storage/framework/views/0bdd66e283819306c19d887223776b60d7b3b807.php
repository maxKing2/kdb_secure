<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"><?php echo e($page->translation->title); ?></span>
          <h1 class="text-capitalize mb-5 text-lg"><?php echo e($page->translation->title); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section general-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
        <?php echo xss_clean($page->translation->body); ?>

			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/theme/page.blade.php ENDPATH**/ ?>