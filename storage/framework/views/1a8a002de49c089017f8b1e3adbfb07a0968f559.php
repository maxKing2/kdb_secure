<?php $__env->startSection('content'); ?>
<!-- Slider Start -->
<section class="banner d-flex align-items-center" style="background: url(<?php echo e(get_option('home_banner') == '' ? asset('public/theme/images/slider-bg-1.jpg') : media_images(get_option('home_banner'))); ?>)">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="block">
					<h1 class="mb-3"><?php echo e(get_trans_option('main_heading')); ?></h1>

					<p class="mb-4 pr-5 text-white"><?php echo e(get_trans_option('sub_heading')); ?></p>
					<div class="btn-container">
						<a href="<?php echo e(get_option('allow_singup') == 'yes' ? route('register') : route('login')); ?>" target="_blank" class="btn btn-main-2">Get Started <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-img">
					<img src="<?php echo e(get_option('home_about_us_banner') == '' ? asset('public/theme/images/about-us.jpg') : media_images(get_option('home_about_us_banner'))); ?>" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color"><?php echo e(get_trans_option('home_about_us_heading')); ?></h2>
					<p class="mt-4 mb-5"><?php echo e(get_trans_option('home_about_us_content')); ?></p>

					<a href="<?php echo e(url('/services')); ?>" class="btn btn-main-2 btn-icon"><?php echo e(_lang('Services')); ?><i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3"><?php echo e(get_option('total_customer',0)); ?></span>+
						<p><?php echo e(_lang('Customers')); ?></p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3"><?php echo e(get_option('total_branch',0)); ?></span>
						<p><?php echo e(_lang('Branches')); ?></p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-credit-card"></i>
						<span class="h3"><?php echo e(get_option('total_transactions',0)); ?></span>M
						<p><?php echo e(_lang('Total Transactions')); ?></p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3"><?php echo e(get_option('total_countries',0)); ?></span>+
						<p><?php echo e(_lang('Supported Country')); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section service gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2><?php echo e(get_trans_option('home_service_heading')); ?></h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo e(get_trans_option('home_service_content')); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
		<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<?php echo xss_clean($service->icon); ?>

						<h4 class="mt-3 mb-3"><?php echo e($service->translation->title); ?></h4>
					</div>

					<div class="content">
						<p class="mb-4"><?php echo e($service->translation->body); ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</section>

<section class="section fdr-plan">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2><?php echo e(get_trans_option('home_fixed_deposit_heading')); ?></h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo e(get_trans_option('home_fixed_deposit_content')); ?></p>
				</div>
			</div>
		</div>

		<div class="row">

			<?php $__currentLoopData = $fdr_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fdr_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-4">
				<div class="fdr-item mb-4">
					<div class="title">
						<div class="d-flex flex-wrap justify-content-between">
							<h4 class="my-3"><?php echo e($fdr_plan->name); ?></h4>
							<h4 class="my-3"><?php echo e($fdr_plan->interest_rate); ?>%</h4>
						</div>
					</div>

					<div class="content">
						<ul class="plan-feature-list pl-0">
							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Duration')); ?></span>
								<span><?php echo e($fdr_plan->duration.' '._dlang(ucwords($fdr_plan->duration_type))); ?></span>
							</li>
							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Interest Rate')); ?></span>
								<span><?php echo e($fdr_plan->interest_rate.' %'); ?></span>
							</li>

							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Minimum')); ?></span>
								<span><?php echo e(decimalPlace($fdr_plan->minimum_amount, currency())); ?></span>
							</li>
							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Maximum')); ?></span>
								<span><?php echo e(decimalPlace($fdr_plan->maximum_amount, currency())); ?></span>
							</li>
						</ul>
						<a href="<?php echo e(route('fixed_deposits.apply')); ?>" class="btn btn-main-2 btn-block"><?php echo e(_lang('Apply Now')); ?></a>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</section>


<section class="section loan gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2><?php echo e(get_trans_option('home_loan_heading')); ?></h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo e(get_trans_option('home_loan_content')); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php $__currentLoopData = $loan_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-4">
				<div class="loan-item mb-4">
					<div class="title">
						<div class="d-flex flex-wrap justify-content-between">
							<h4 class="my-3"><?php echo e($loan_plan->name); ?></h4>
							<h4 class="my-3"><?php echo e($loan_plan->interest_rate.' %'); ?></h4>
						</div>
					</div>

					<div class="content">
						<ul class="plan-feature-list pl-0">
							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Term')); ?></span>
								<span>
									<?php echo e($loan_plan->term); ?>

									<?php if($loan_plan->term_period === '+1 month'): ?>
										<?php echo e(_lang('Month')); ?>

									<?php elseif($loan_plan->term_period === '+1 year'): ?>
										<?php echo e(_lang('Year')); ?>

									<?php elseif($loan_plan->term_period === '+1 day'): ?>
										<?php echo e(_lang('Day')); ?>

									<?php elseif($loan_plan->term_period === '+1 week'): ?>
										<?php echo e(_lang('Week')); ?>

									<?php endif; ?>
								</span>
							</li>

							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Interest Rate')); ?></span>
								<span><?php echo e($loan_plan->interest_rate.' %'); ?></span>
							</li>

							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Interest Type')); ?></span>
								<span><?php echo e(ucwords(str_replace("_"," ", $loan_plan->interest_type))); ?></span>
							</li>

							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Minimum')); ?></span>
								<span><?php echo e(decimalPlace($loan_plan->minimum_amount, currency())); ?></span>
							</li>

							<li class="d-flex flex-wrap justify-content-between">
								<span><?php echo e(_lang('Maximum')); ?></span>
								<span><?php echo e(decimalPlace($loan_plan->maximum_amount, currency())); ?></span>
							</li>
						</ul>
						<a href="<?php echo e(route('loans.apply_loan')); ?>" class="btn btn-main btn-block">Apply Now</a>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</section>


<section class="section testimonial-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2><?php echo e(get_trans_option('home_testimonial_heading')); ?></h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo e(get_trans_option('home_testimonial_content')); ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
			<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="testimonial-block style-2 gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="testimonial-thumb">
						<img src="<?php echo e(media_images($testimonial->image)); ?>" alt="<?php echo e($testimonial->translation->name); ?>" class="img-fluid">
					</div>

					<div class="client-info">
						<h4><?php echo e($testimonial->translation->name); ?></h4>
						<p><?php echo e($testimonial->translation->testimonial); ?></p>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/theme/index.blade.php ENDPATH**/ ?>