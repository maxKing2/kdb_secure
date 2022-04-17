<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo e(get_option('site_title', config('app.name'))); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(get_favicon()); ?>">

		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

		<!-- DataTables -->
		<link href="<?php echo e(asset('backend/plugins/datatable/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo e(asset('backend/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('backend/plugins/sweet-alert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('backend/plugins/animate/animate.css')); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo e(asset('backend/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('backend/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />
	    <link href="<?php echo e(asset('backend/plugins/jquery-toast-plugin/jquery.toast.min.css')); ?>" rel="stylesheet" />

		<!-- App Css -->
		<link rel="stylesheet" href="<?php echo e(asset('backend/assets/fonts/icofont/icofont.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/styles.css')); ?>">

		<!-- Modernizr -->
		<script src="<?php echo e(asset('backend/assets/js/modernizr-2.8.3.min.js')); ?>"></script>


		<?php if(get_option('backend_direction') == "rtl"): ?>
			<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/rtl/bootstrap.min.css')); ?>">
			<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/rtl/style.css')); ?>">
		<?php endif; ?>

		<?php echo $__env->make('layouts.others.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>

    <body class="sb-nav-fixed">
		<!-- Main Modal -->
		<div id="main_modal" class="modal" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				    <div class="modal-header">
						<h5 class="modal-title mt-0 ml-2"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				    </div>

				    <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
				    <div class="alert alert-secondary d-none mx-3 mt-3 mb-0"></div>
				    <div class="modal-body overflow-hidden"></div>

				</div>
		    </div>
		</div>

		<!-- Secondary Modal -->
		<div id="secondary_modal" class="modal" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				    <div class="modal-header">
						<h5 class="modal-title mt-0 ml-2"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				    </div>

				    <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
				    <div class="alert alert-secondary d-none mx-3 mt-3 mb-0"></div>
				    <div class="modal-body overflow-hidden"></div>
				</div>
		    </div>
		</div>

		<!-- Preloader area start -->
		<div id="preloader"></div>
		<!-- Preloader area end -->

		<!--Header Nav-->
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
				<a class="navbar-brand text-md-center" href="<?php echo e(route('dashboard.index')); ?>"><?php echo e(get_option('site_title', config('app.name'))); ?></a>
				<button class="btn btn-link btn-sm mr-auto" id="sidebarToggle" href="#">
					<div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
				</button>

				<ul class="navbar-nav ml-auto ml-md-0 notification-area">
					<li class="nav-item dropdown animate-dropdown">
						<i class="icofont-notification dropdown-toggle" data-toggle="dropdown">
							<?php $notificatioCount = Auth::user()->unreadNotifications->count(); ?>
							<?php if($notificatioCount > 0): ?>
								<span id="notification-count"><?php echo e(Auth::user()->unreadNotifications->count()); ?></span>
							<?php endif; ?>
						</i>
						<div class="dropdown-menu dropdown-menu-right bell-notify-box notify-box">
							<?php if($notificatioCount > 0): ?>
							<span class="notify-title"><?php echo e(_lang('You have').' '.$notificatioCount.' '._lang('new notifications')); ?></span>
							<?php else: ?>
							<span class="notify-title"><?php echo e(_lang('You have no new notification!')); ?></span>
							<?php endif; ?>
							<div class="nofity-list">
								<?php $notifications = Auth::user()->notifications->take(15); ?>
								<?php if($notifications->count() == 0): ?>
									<p class="text-center pt-3"><?php echo e(_lang('You have no notification!')); ?></p>
								<?php endif; ?>
								<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="d-flex notify-item">
										<a href="<?php echo e(route('profile.show_notification', $notification->id)); ?>" class="ajax-modal" data-title="<?php echo e(_lang('Notification')); ?>">
											<div class="notify-text">
												<p class="<?php echo e($notification->read_at == null ? 'unread-notification' : ''); ?>"><?php echo e($notification->data['message']); ?></p>
												<span><?php echo e($notification->created_at->diffForHumans()); ?></span>
											</div>
										</a>

										<?php if($notification->read_at == null): ?>
										<a href="<?php echo e(route('profile.notification_mark_as_read', $notification->id)); ?>" class="notification_mark_as_read"><i class="icofont-checked"></i></a>
										<?php endif; ?>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto ml-md-0">
					<li class="nav-item dropdown animate-dropdown">
						<a class="nav-link dropdown-toggle" id="languageSelector" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont-world"></i> <?php echo e(session('language') =='' ? get_option('language') : session('language')); ?></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageSelector">
							<?php $__currentLoopData = get_language_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a class="dropdown-item" href="<?php echo e(url('/')); ?>?language=<?php echo e($language); ?>"><?php echo e($language); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto ml-md-0">
					<li class="nav-item dropdown animate-dropdown">
						<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont-ui-user"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>"><i class="icofont-ui-user"></i> <?php echo e(_lang('Profile Overview')); ?></a>
							<a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><i class="icofont-ui-edit"></i> <?php echo e(_lang('Profile Settings')); ?></a>
							<a class="dropdown-item" href="<?php echo e(route('profile.change_password')); ?>"><i class="icofont-exchange"></i></i> <?php echo e(_lang('Change Password')); ?></a>
							<?php if(auth()->user()->user_type == 'admin'): ?>
							<a class="dropdown-item" href="<?php echo e(route('settings.update_settings')); ?>"><i class="icofont-ui-settings"></i> <?php echo e(_lang('System Settings')); ?></a>
							<?php endif; ?>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><i class="icofont-exit"></i> <?php echo e(_lang('Logout')); ?></a>
						</div>
					</li>
				</ul>

			</div>
        </nav><!--End Header Nav-->

		<div id="layoutSidenav" class="container-fluid d-flex align-items-stretch">
			<div id="layoutSidenav_nav">
				<span class="close-mobile-nav"><i class="icofont-close-line-squared-alt"></i></span>
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

					<div class="sidebar-user">
                        <a href="javascript: void(0);">
                            <img src="<?php echo e(profile_picture()); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="sidebar-user-name"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                    </div>

					<div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php echo $__env->make('layouts.menus.'.Auth::user()->user_type, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </nav>
            </div><!--End layoutSidenav_nav-->

			<div id="layoutSidenav_content">

				<main>
					<div class="row">
						<div class="<?php echo e(isset($alert_col) ? $alert_col : 'col-lg-12'); ?>">
							<div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
								<button type="button" id="close_alert" class="close">
									<span aria-hidden="true"><i class="icofont-close-line-squared-alt"></i></span>
								</button>
								<span class="msg"></span>
							</div>
						</div>
					</div>

					<?php echo $__env->yieldContent('content'); ?>
				</main>

			</div>	<!--End layoutSidenav_content-->
		</div> <!--End layoutSidenav-->

		<!-- Core Js  -->
		<script src="<?php echo e(asset('backend/assets/js/jquery-3.6.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

		<script src="<?php echo e(asset('backend/assets/js/print.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/assets/js/pace.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/assets/js/clipboard.min.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/plugins/moment/moment.js')); ?>"></script>

		<!-- Datatable js -->
        <script src="<?php echo e(asset('backend/plugins/datatable/datatables.min.js')); ?>"></script>

		<script src="<?php echo e(asset('backend/plugins/dropify/js/dropify.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/sweet-alert2/sweetalert2.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/select2/select2.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/tinymce/tinymce.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/parsleyjs/parsley.min.js')); ?>"></script>
		<script src="<?php echo e(asset('backend/plugins/jquery-toast-plugin/jquery.toast.min.js')); ?>"></script>

        <!-- App js -->
        <script src="<?php echo e(asset('backend/assets/js/scripts.js?v=1.1')); ?>"></script>

		<script type="text/javascript">
		(function($) {

    		"use strict";

			//Show Success Message
			<?php if(Session::has('success')): ?>
		       $("#main_alert > span.msg").html(" <?php echo e(session('success')); ?> ");
			   $("#main_alert").addClass("alert-success").removeClass("alert-danger");
			   $("#main_alert").css('display','block');
			<?php endif; ?>

			//Show Single Error Message
			<?php if(Session::has('error')): ?>
			   $("#main_alert > span.msg").html(" <?php echo e(session('error')); ?> ");
			   $("#main_alert").addClass("alert-danger").removeClass("alert-success");
			   $("#main_alert").css('display','block');
			<?php endif; ?>

			<?php $i =0; ?>

			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <?php if($loop->first): ?>
					$("#main_alert > span.msg").html("<i class='typcn typcn-delete'></i> <?php echo e($error); ?> ");
					$("#main_alert").addClass("alert-danger").removeClass("alert-success");
				<?php else: ?>
                    $("#main_alert > span.msg").append("<br><i class='typcn typcn-delete'></i> <?php echo e($error); ?> ");
				<?php endif; ?>

				<?php if($loop->last): ?>
					$("#main_alert").css('display','block');
				<?php endif; ?>

				<?php if(isset($errors->keys()[$i])): ?>
					var name = "<?php echo e($errors->keys()[$i]); ?>";

					$("input[name='" + name + "']").addClass('error is-invalid');
					$("select[name='" + name + "'] + span").addClass('error is-invalid');

					$("input[name='"+name+"'], select[name='"+name+"']").parent().append("<span class='v-error'><?php echo e($error); ?></span>");
				<?php endif; ?>
				<?php $i++; ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        })(jQuery);

	 </script>

	 <!-- Custom JS -->
	 <?php echo $__env->yieldContent('js-script'); ?>

    </body>
</html><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/layouts/app.blade.php ENDPATH**/ ?>