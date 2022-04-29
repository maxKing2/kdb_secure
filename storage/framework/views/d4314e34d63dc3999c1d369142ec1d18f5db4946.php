<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $settings = \App\Models\Setting::all(); ?>

    <div class="col-lg-3 col-md-4 col-sm-5">
		<ul class="nav flex-column nav-tabs settings-tab" role="tablist">
			 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home-page"><?php echo e(_lang('Home Page')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about-page"><?php echo e(_lang('About Page')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#footer"><?php echo e(_lang('Footer Setion')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#seo"><?php echo e(_lang('SEO Settings')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#custom_css"><?php echo e(_lang('Custom CSS & JS')); ?></a></li>
		</ul>
	</div>

    <div class="col-lg-9 col-md-8 col-sm-7">
        <div class="tab-content">
            <div id="home-page" class="tab-pane active">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(_lang('Home Page Settings')); ?></h4>
                    </div>

                    <?php $navigations = App\Models\Navigation::where('status',1)->get(); ?>

                    <div class="card-body">
                        <form method="post" class="settings-submit params-panel" autocomplete="off"
                            action="<?php echo e(route('theme_option.update','store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Main Heading')); ?></label>
                                        <input type="text" class="form-control" name="main_heading"
                                            value="<?php echo e(get_trans_option('main_heading')); ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Sub Heading')); ?></label>
                                        <input type="text" class="form-control" name="sub_heading"
                                            value="<?php echo e(get_trans_option('sub_heading')); ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Primary Menu')); ?></label>
                                        <select class="form-control auto-select" data-selected="<?php echo e(get_option('primary_menu')); ?>" name="primary_menu">
                                            <option value=""><?php echo e(_lang('Select One')); ?></option>
                                            <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($navigation->id); ?>"><?php echo e($navigation->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Home Banner')); ?></label>
                                        <input type="file" class="dropify" name="home_banner" data-default-file="<?php echo e(get_setting($settings, 'home_banner') != '' ? asset('/uploads/media/'.get_setting($settings, 'home_banner')) : ''); ?>""  data-allowed-file-extensions="png jpg">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('About Us Banner')); ?></label>
                                        <input type="file" class="dropify" name="home_about_us_banner" data-default-file="<?php echo e(get_setting($settings, 'home_about_us_banner') != '' ? asset('/uploads/media/'.get_setting($settings, 'home_about_us_banner')) : ''); ?>""  data-allowed-file-extensions="png jpg">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Total Customers')); ?></label>
                                        <input type="text" class="form-control" name="total_customer"
                                            value="<?php echo e(get_setting($settings, 'total_customer',0)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Total Branches')); ?></label>
                                        <input type="text" class="form-control" name="total_branch"
                                            value="<?php echo e(get_setting($settings, 'total_branch',0)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Total Transactions')); ?></label>
                                        <input type="text" class="form-control" name="total_transactions"
                                            value="<?php echo e(get_setting($settings, 'total_transactions',0)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Total Countries')); ?></label>
                                        <input type="text" class="form-control" name="total_countries"
                                            value="<?php echo e(get_setting($settings, 'total_countries',0)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('About Us Heading')); ?></label>
                                        <input type="text" class="form-control" name="home_about_us_heading"
                                            value="<?php echo e(get_trans_option('home_about_us_heading')); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('About Us Content')); ?></label>
                                        <textarea class="form-control"
                                            name="home_about_us_content"><?php echo e(get_trans_option('home_about_us_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Services Heading')); ?></label>
                                        <input type="text" class="form-control" name="home_service_heading"
                                            value="<?php echo e(get_trans_option('home_service_heading')); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Services Content')); ?></label>
                                        <textarea class="form-control"
                                            name="home_service_content"><?php echo e(get_trans_option('home_service_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Fixed Deposit Heading')); ?></label>
                                        <input type="text" class="form-control" name="home_fixed_deposit_heading"
                                            value="<?php echo e(get_trans_option('home_fixed_deposit_heading')); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Fixed Deposit Content')); ?></label>
                                        <textarea class="form-control"
                                            name="home_fixed_deposit_content"><?php echo e(get_trans_option('home_fixed_deposit_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Loan Heading')); ?></label>
                                        <input type="text" class="form-control" name="home_loan_heading"
                                            value="<?php echo e(get_trans_option('home_loan_heading')); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Loan Content')); ?></label>
                                        <textarea class="form-control"
                                            name="home_loan_content"><?php echo e(get_trans_option('home_loan_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Testimonial Heading')); ?></label>
                                        <input type="text" class="form-control" name="home_testimonial_heading"
                                            value="<?php echo e(get_trans_option('home_testimonial_heading')); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Testimonial Content')); ?></label>
                                        <textarea class="form-control"
                                            name="home_testimonial_content"><?php echo e(get_trans_option('home_testimonial_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="about-page" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(_lang('About Page Settings')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form method="post" class="settings-submit params-panel" autocomplete="off"
                            action="<?php echo e(route('theme_option.update','store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Title')); ?></label>
                                        <input type="text" class="form-control" name="about_page_title"
                                            value="<?php echo e(get_trans_option('about_page_title')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Our Team Title')); ?></label>
                                        <input type="text" class="form-control" name="our_team_title"
                                            value="<?php echo e(get_trans_option('our_team_title')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Our Team Sub Title')); ?></label>
                                        <input type="text" class="form-control" name="our_team_sub_title"
                                            value="<?php echo e(get_trans_option('our_team_sub_title')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('About Us Image')); ?></label>
                                        <input type="file" class="dropify" name="about_us_image" data-default-file="<?php echo e(get_setting($settings, 'about_us_image') != '' ? asset('/uploads/media/'.get_setting($settings, 'about_us_image')) : ''); ?>""  data-allowed-file-extensions="png jpg">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('About Us Content')); ?></label>
                                        <textarea class="form-control" rows="6"
                                            name="about_us_content"><?php echo e(get_trans_option('about_us_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div id="footer" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(_lang('Footer Settings')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form method="post" class="settings-submit params-panel" autocomplete="off"
                            action="<?php echo e(route('theme_option.update','store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Footer Menu 1 Title')); ?></label>
                                        <input type="text" class="form-control" name="footer_menu_1_title" value="<?php echo e(get_trans_option('footer_menu_1_title')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Footer Menu 1')); ?></label>
                                        <select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'footer_menu_1')); ?>" name="footer_menu_1">
                                            <option value=""><?php echo e(_lang('Select One')); ?></option>
                                            <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($navigation->id); ?>"><?php echo e($navigation->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Footer Menu 2 Title')); ?></label>
                                        <input type="text" class="form-control" name="footer_menu_2_title" value="<?php echo e(get_trans_option('footer_menu_2_title')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Footer Menu 2')); ?></label>
                                        <select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'footer_menu_2')); ?>" name="footer_menu_2">
                                            <option value=""><?php echo e(_lang('Select One')); ?></option>
                                            <?php $__currentLoopData = $navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($navigation->id); ?>"><?php echo e($navigation->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Footer About Us')); ?></label>
                                        <textarea class="form-control"
                                            name="footer_about_us"><?php echo e(get_trans_option('footer_about_us')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Facebook Link')); ?></label>
                                        <input type="text" class="form-control" name="facebook_link"
                                            value="<?php echo e(get_setting($settings, 'facebook_link')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Twitter Link')); ?></label>
                                        <input type="text" class="form-control" name="twitter_link"
                                            value="<?php echo e(get_setting($settings, 'twitter_link')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Linkedin Link')); ?></label>
                                        <input type="text" class="form-control" name="linkedin_link"
                                            value="<?php echo e(get_setting($settings, 'linkedin_link')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Copyright Text')); ?></label>
                                        <input type="text" class="form-control" name="copyright"
                                            value="<?php echo e(get_trans_option('copyright')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div id="seo" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(_lang('SEO Settings')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form method="post" class="settings-submit params-panel" autocomplete="off"
                            action="<?php echo e(route('theme_option.update','store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Meta Keywords')); ?></label>
                                        <input type="text" class="form-control" name="meta_keywords"
                                            value="<?php echo e(get_setting($settings, 'meta_keywords')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('Meta Content')); ?></label>
                                        <textarea class="form-control"
                                            name="meta_content"><?php echo e(get_setting($settings, 'meta_content')); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div id="custom_css" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(_lang('Custom CSS & JS')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form method="post" class="settings-submit params-panel" autocomplete="off"
                            action="<?php echo e(route('theme_option.update','store')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('CSS CODE')); ?></label>
                                        <textarea class="form-control" rows="10"
                                            name="custom_css"><?php echo e(get_setting($settings, 'custom_css')); ?></textarea>
                                        <small class="text-danger"><?php echo e(_lang('Write Your CSS Code without style tag')); ?> !</small>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(_lang('JS CODE')); ?></label>
                                        <textarea class="form-control" rows="10"
                                            name="custom_js"><?php echo e(get_setting($settings, 'custom_js')); ?></textarea>
                                        <small class="text-danger"><?php echo e(_lang('Write Your JS Code without script tag')); ?> !</small>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div><!--End Tab COntent-->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/administration/general_settings/theme_option.blade.php ENDPATH**/ ?>