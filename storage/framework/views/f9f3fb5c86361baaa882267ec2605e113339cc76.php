<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"><?php echo e(_lang('About Us')); ?></span>
          <h1 class="text-capitalize mb-5 text-lg"><?php echo e(get_trans_option('about_page_title')); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section team gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4"><?php echo e(get_trans_option('our_team_title')); ?></h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo e(get_trans_option('our_team_sub_title')); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php $__currentLoopData = $team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="<?php echo e(media_images($team_member->image)); ?>" alt="<?php echo e($team_member->name); ?>" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><?php echo e($team_member->name); ?></h4>
						<p><?php echo e($team_member->role); ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</section>

<section class="section testimonial">
	<div class="testimonial-bg" style="background: url(<?php echo e(get_option('about_us_image') == '' ? asset('public/theme/images/about-us-main.jpg'): media_images(get_option('about_us_image'))); ?>)"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6">
				<div class="section-title">
					<h2 class="mb-4"><?php echo e(get_trans_option('about_page_title')); ?></h2>
					<div class="divider my-4"></div>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 offset-lg-6">
				<?php echo xss_clean(get_trans_option('about_us_content')); ?>

			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/theme/about.blade.php ENDPATH**/ ?>