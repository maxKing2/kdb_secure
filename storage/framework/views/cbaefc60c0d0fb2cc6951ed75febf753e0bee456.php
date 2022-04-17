<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
			<span class="text-white"><?php echo e(_lang('Contact Us')); ?></span>
            <h1 class="text-capitalize mb-5 text-lg"><?php echo e(_lang('Get in Touch')); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section contact-info pb-0">
    <div class="container">
         <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5><?php echo e(_lang('Call Us')); ?></h5>
                    <?php echo e(get_option('phone')); ?>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-support-faq"></i>
                    <h5><?php echo e(_lang('Email Us')); ?></h5>
                    <?php echo e(get_option('email')); ?>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5><?php echo e(_lang('Location')); ?></h5>
                    <?php echo e(get_option('address')); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2"><?php echo e(_lang('Contact Us')); ?></h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-5"><?php echo e(_lang('Write us a message')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" class="contact__form"  autocomplete="off" method="post" action="<?php echo e(url('/send_message')); ?>">
                    <!-- form message -->
                    <div class="row mb-2">
                        <div class="col-12">
                        <?php if(\Session::has('success')): ?>
                            <div class="alert alert-success mb-2">
                                <span><?php echo e(session('success')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(\Session::has('error')): ?>
                            <div class="alert alert-danger mb-2">
                                <span><?php echo e(session('error')); ?></span>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" placeholder="<?php echo e(_lang('Your Name')); ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="<?php echo e(_lang('Your Email')); ?>" required>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="subject" id="subject" type="text" class="form-control" placeholder="<?php echo e(_lang('Your Subjects')); ?>" required>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="text" class="form-control" placeholder="<?php echo e(_lang('Your Phone')); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" rows="8" placeholder="<?php echo e(_lang('Your message')); ?>" required></textarea>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" name="submit" type="submit" value="<?php echo e(_lang('Send Message')); ?>"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/theme/contact.blade.php ENDPATH**/ ?>