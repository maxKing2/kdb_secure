<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-sm-3">
		<ul class="nav flex-column nav-tabs settings-tab" role="tablist">
			 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#general"><i class="icofont-settings"></i> <?php echo e(_lang('General Settings')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#system"><i class="icofont-ui-settings"></i> <?php echo e(_lang('System Settings')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#request_otp"><i class="icofont-smart-phone"></i> <?php echo e(_lang('Request & OTP')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#email"><i class="icofont-email"></i> <?php echo e(_lang('Email Configurations')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#payment_gateway"><i class="icofont-ui-messaging"></i> <?php echo e(_lang('SMS Gateway')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#social_login"><i class="icofont-google-plus"></i> <?php echo e(_lang('Social Login')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#google_recaptcha"><i class="icofont-verification-check"></i> <?php echo e(_lang('Google Recaptcha v3')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cron_jobs"><i class="icofont-clock-time"></i> <?php echo e(_lang('Cron Jobs')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#logo"><i class="icofont-image"></i> <?php echo e(_lang('Logo and Favicon')); ?></a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cache"><i class="icofont-server"></i> <?php echo e(_lang('Cache Control')); ?></a></li>
		</ul>
	</div>

	<?php $settings = \App\Models\Setting::all(); ?>

	<div class="col-sm-9">
		<div class="tab-content">
			<div id="general" class="tab-pane active">
				<div class="card">

					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('General Settings')); ?></h4>
					</div>

					<div class="card-body">
						 <form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Company Name')); ?></label>
									<input type="text" class="form-control" name="company_name" value="<?php echo e(get_setting($settings, 'company_name')); ?>" required>
								  </div>
								</div>

								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Site Title')); ?></label>
									<input type="text" class="form-control" name="site_title" value="<?php echo e(get_setting($settings, 'site_title')); ?>" required>
								  </div>
								</div>

								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Phone')); ?></label>
									<input type="text" class="form-control" name="phone" value="<?php echo e(get_setting($settings, 'phone')); ?>">
								  </div>
								</div>

								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Email')); ?></label>
									<input type="email" class="form-control" name="email" value="<?php echo e(get_setting($settings, 'email')); ?>">
								  </div>
								</div>


								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Timezone')); ?></label>
									<select class="form-control select2" name="timezone" required>
									<option value=""><?php echo e(_lang('-- Select One --')); ?></option>
									<?php echo e(create_timezone_option(get_setting($settings, 'timezone'))); ?>

									</select>
								  </div>
								</div>


								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Language')); ?></label>
									<select class="form-control select2" name="language">
										<option value=""><?php echo e(_lang('-- Select One --')); ?></option>
										<?php echo e(load_language( get_setting($settings, 'language') )); ?>

									</select>
								  </div>
								</div>

								<div class="col-md-12">
								  <div class="form-group">
									<label class="control-label"><?php echo e(_lang('Address')); ?></label>
									<textarea class="form-control" name="address"><?php echo e(get_setting($settings, 'address')); ?></textarea>
								  </div>
								</div>


								<div class="col-md-12">
								  <div class="form-group">
									<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
								  </div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="system" class="tab-pane">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('System Settings')); ?></h4>
					</div>

					<div class="card-body">

						<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Website')); ?></label>
										<select class="form-control" name="website_enable" required>
											<option value="yes" <?php echo e(get_setting($settings, 'website_enable') == 'yes' ? 'selected' : ''); ?>><?php echo e(_lang('Enable')); ?></option>
											<option value="no" <?php echo e(get_setting($settings, 'website_enable') == 'no' ? 'selected' : ''); ?>><?php echo e(_lang('Disable')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Backend Direction')); ?></label>
										<select class="form-control" name="backend_direction" required>
											<option value="ltr" <?php echo e(get_setting($settings, 'backend_direction') == 'ltr' ? 'selected' : ''); ?>><?php echo e(_lang('LTR')); ?></option>
											<option value="rtl" <?php echo e(get_setting($settings, 'backend_direction') == 'rtl' ? 'selected' : ''); ?>><?php echo e(_lang('RTL')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Currency Position')); ?></label>
										<select class="form-control" name="currency_position" required>
											<option value="left" <?php echo e(get_setting($settings, 'currency_position') == 'left' ? 'selected' : ''); ?>><?php echo e(_lang('Left')); ?></option>
											<option value="right" <?php echo e(get_setting($settings, 'currency_position') == 'right' ? 'selected' : ''); ?>><?php echo e(_lang('Right')); ?></option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Date Format')); ?></label>
										<select class="form-control auto-select" name="date_format" data-selected="<?php echo e(get_setting($settings, 'date_format','Y-m-d')); ?>" required>
											<option value="Y-m-d"><?php echo e(date('Y-m-d')); ?></option>
											<option value="d-m-Y"><?php echo e(date('d-m-Y')); ?></option>
											<option value="d/m/Y"><?php echo e(date('d/m/Y')); ?></option>
											<option value="m-d-Y"><?php echo e(date('m-d-Y')); ?></option>
											<option value="m.d.Y"><?php echo e(date('m.d.Y')); ?></option>
											<option value="m/d/Y"><?php echo e(date('m/d/Y')); ?></option>
											<option value="d.m.Y"><?php echo e(date('d.m.Y')); ?></option>
											<option value="d/M/Y"><?php echo e(date('d/M/Y')); ?></option>
											<option value="d/M/Y"><?php echo e(date('M/d/Y')); ?></option>
											<option value="d M, Y"><?php echo e(date('d M, Y')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Time Format')); ?></label>
										<select class="form-control auto-select" name="time_format" data-selected="<?php echo e(get_setting($settings, 'time_format',24)); ?>" required>
											<option value="24"><?php echo e(_lang('24 Hours')); ?></option>
											<option value="12"><?php echo e(_lang('12 Hours')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Allow Sign Up')); ?></label>
										<select class="form-control" name="allow_singup" required>
											<option value="yes" <?php echo e(get_setting($settings, 'allow_singup') == 'yes' ? 'selected' : ''); ?>><?php echo e(_lang('Enable')); ?></option>
											<option value="no" <?php echo e(get_setting($settings, 'allow_singup') == 'no' ? 'selected' : ''); ?>><?php echo e(_lang('Disable')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Email Verification')); ?></label>
										<select class="form-control" name="email_verification" required>
											<option value="disabled" <?php echo e(get_setting($settings, 'email_verification') == 'disabled' ? 'selected' : ''); ?>><?php echo e(_lang('Disable')); ?></option>
											<option value="enabled" <?php echo e(get_setting($settings, 'email_verification') == 'enabled' ? 'selected' : ''); ?>><?php echo e(_lang('Enable')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Mobile Verification')); ?></label>
										<select class="form-control" name="mobile_verification" required>
											<option value="disabled" <?php echo e(get_setting($settings, 'mobile_verification') == 'disabled' ? 'selected' : ''); ?>><?php echo e(_lang('Disable')); ?></option>
											<option value="enabled" <?php echo e(get_setting($settings, 'mobile_verification') == 'enabled' ? 'selected' : ''); ?>><?php echo e(_lang('Enable')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Enable 2FA')); ?></label>
										<select class="form-control" name="enable_2fa" required>
											<option value="no" <?php echo e(get_setting($settings, 'enable_2fa') == 'no' ? 'selected' : ''); ?>><?php echo e(_lang('No')); ?></option>
											<option value="yes" <?php echo e(get_setting($settings, 'enable_2fa') == 'yes' ? 'selected' : ''); ?>><?php echo e(_lang('Yes')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Enable KYC')); ?></label>
										<select class="form-control" name="enable_kyc" required>
											<option value="no" <?php echo e(get_setting($settings, 'enable_kyc') == 'no' ? 'selected' : ''); ?>><?php echo e(_lang('No')); ?></option>
											<option value="yes" <?php echo e(get_setting($settings, 'enable_kyc') == 'yes' ? 'selected' : ''); ?>><?php echo e(_lang('Yes')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Next Account Number')); ?></label>
										<input type="number" class="form-control" name="next_account_number" value="<?php echo e(next_account_number()); ?>">
									</div>
								</div>

								<div class="col-md-12">
								  <div class="form-group">
									<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
								  </div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="request_otp" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Requests & OTP')); ?></h4>
					</div>

					<div class="card-body">
						<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Send Money')); ?></label>
										<select class="form-control" name="send_money_action" id="send_money_action" required>
											<option value="0" <?php echo e(get_setting($settings, 'send_money_action')== 0 ? "selected" : ""); ?>><?php echo e(_lang('Approval Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'send_money_action')== 1 ? "selected" : ""); ?>><?php echo e(_lang('Approval Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Send Money OTP')); ?></label>
										<select class="form-control" name="send_money_otp" id="send_money_otp" required>
											<option value="0" <?php echo e(get_setting($settings, 'send_money_otp')== 0 ? "selected" : ""); ?>><?php echo e(_lang('OTP Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'send_money_otp')== 1 ? "selected" : ""); ?>><?php echo e(_lang('OTP Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Exchange Money')); ?></label>
										<select class="form-control" name="exchange_money_action" id="exchange_money_action" required>
											<option value="0" <?php echo e(get_setting($settings, 'exchange_money_action')== 0 ? "selected" : ""); ?>><?php echo e(_lang('Approval Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'exchange_money_action')== 1 ? "selected" : ""); ?>><?php echo e(_lang('Approval Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Exchange Money OTP')); ?></label>
										<select class="form-control" name="exchange_money_otp" id="exchange_money_otp" required>
											<option value="0" <?php echo e(get_setting($settings, 'exchange_money_otp')== 0 ? "selected" : ""); ?>><?php echo e(_lang('OTP Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'exchange_money_otp')== 1 ? "selected" : ""); ?>><?php echo e(_lang('OTP Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Withdraw Money')); ?></label>
										<input type="text" class="form-control"  value="<?php echo e(_lang('Approval Required')); ?>" readonly="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Withdraw Money OTP')); ?></label>
										<select class="form-control" name="withdraw_money_otp" id="withdraw_money_otp" required>
											<option value="0" <?php echo e(get_setting($settings, 'withdraw_money_otp')== 0 ? "selected" : ""); ?>><?php echo e(_lang('OTP Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'withdraw_money_otp')== 1 ? "selected" : ""); ?>><?php echo e(_lang('OTP Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Wire Transfer')); ?></label>
										<input type="text" class="form-control"  value="<?php echo e(_lang('Approval Required')); ?>" readonly="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Wire Transfer OTP')); ?></label>
										<select class="form-control" name="wire_transfer_otp" id="wire_transfer_otp" required>
											<option value="0" <?php echo e(get_setting($settings, 'wire_transfer_otp')== 0 ? "selected" : ""); ?>><?php echo e(_lang('OTP Not Required')); ?></option>
											<option value="1" <?php echo e(get_setting($settings, 'wire_transfer_otp')== 1 ? "selected" : ""); ?>><?php echo e(_lang('OTP Required')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="email" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Email Settings')); ?></h4>
					</div>

					<div class="card-body">
						<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Mail Type')); ?></label>
										<select class="form-control niceselect wide" name="mail_type" id="mail_type" required>
											<option value="smtp" <?php echo e(get_setting($settings, 'mail_type')=="smtp" ? "selected" : ""); ?>><?php echo e(_lang('SMTP')); ?></option>
											<option value="sendmail" <?php echo e(get_setting($settings, 'mail_type')=="sendmail" ? "selected" : ""); ?>><?php echo e(_lang('Sendmail')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('From Email')); ?></label>
										<input type="text" class="form-control" name="from_email" value="<?php echo e(get_setting($settings, 'from_email')); ?>" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('From Name')); ?></label>
										<input type="text" class="form-control" name="from_name" value="<?php echo e(get_setting($settings, 'from_name')); ?>" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('SMTP Host')); ?></label>
										<input type="text" class="form-control smtp" name="smtp_host" value="<?php echo e(get_setting($settings, 'smtp_host')); ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('SMTP Port')); ?></label>
										<input type="text" class="form-control smtp" name="smtp_port" value="<?php echo e(get_setting($settings, 'smtp_port')); ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('SMTP Username')); ?></label>
										<input type="text" class="form-control smtp" autocomplete="off" name="smtp_username" value="<?php echo e(get_setting($settings, 'smtp_username')); ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('SMTP Password')); ?></label>
										<input type="password" class="form-control smtp" autocomplete="off" name="smtp_password" value="<?php echo e(get_setting($settings, 'smtp_password')); ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('SMTP Encryption')); ?></label>
										<select class="form-control smtp" name="smtp_encryption">
											<option value=""><?php echo e(_lang('None')); ?></option>
											<option value="ssl" <?php echo e(get_setting($settings, 'smtp_encryption')=="ssl" ? "selected" : ""); ?>><?php echo e(_lang('SSL')); ?></option>
											<option value="tls" <?php echo e(get_setting($settings, 'smtp_encryption')=="tls" ? "selected" : ""); ?>><?php echo e(_lang('TLS')); ?></option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="card mt-4">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Send Test Email')); ?></h4>
					</div>

					<div class="card-body">
						<form action="<?php echo e(route('settings.send_test_email')); ?>" class="settings-submit params-panel" method="post">
							<div class="row">
								<?php echo csrf_field(); ?>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Email To')); ?></label>
										<input type="email" class="form-control" name="email_address" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Message')); ?></label>
										<textarea class="form-control" name="message" required></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Send Test Email')); ?></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="payment_gateway" class="tab-pane fade">

				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('SMS Gateway')); ?></h4>
					</div>

					<div class="card-body">
					<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-6">
								  	<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Enable SMS')); ?></label>
											<select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'enable_sms')); ?>" name="enable_sms" required>
											<option value="0"><?php echo e(_lang('No')); ?></option>
											<option value="1"><?php echo e(_lang('Yes')); ?></option>
										</select>
								  	</div>
								</div>

								<div class="col-md-6">
								  	<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Twilio Account SID')); ?></label>
										<input type="text" class="form-control" name="twilio_account_sid" value="<?php echo e(get_setting($settings, 'twilio_account_sid')); ?>">
								  	</div>
								</div>

								<div class="col-md-6">
								  	<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Twilio Auth Token')); ?></label>
										<input type="text" class="form-control" name="twilio_auth_token" value="<?php echo e(get_setting($settings, 'twilio_auth_token')); ?>">
								  	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									  <label class="control-label"><?php echo e(_lang('Twilio Moblie Number')); ?></label>
									  <input type="text" class="form-control" name="twilio_mobile_number" value="<?php echo e(get_setting($settings, 'twilio_mobile_number')); ?>">
									</div>
							  	</div>

								<div class="col-md-12">
								 	<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
								  	</div>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>


			<div id="social_login" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Social Login')); ?></h4>
					</div>
					<div class="card-body">
						<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>


							<h5 class="header-title"><?php echo e(_lang('Google Login')); ?></h5>
							<div class="params-panel border border-dark p-3">
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('Google Login')); ?></label>
											<select class="form-control select2 auto-select" data-selected="<?php echo e(get_setting($settings, 'google_login','disabled')); ?>" name="google_login" required>
												<option value="disabled"><?php echo e(_lang('Disable')); ?></option>
												<option value="enabled"><?php echo e(_lang('Enable')); ?></option>
											</select>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('GOOGLE CLIENT ID')); ?></label> <a href="https://console.developers.google.com/apis/credentials" target="_blank" class="btn-link float-right"><?php echo e(_lang('GET API KEY')); ?></a>
											<input type="text" class="form-control" name="GOOGLE_CLIENT_ID" value="<?php echo e(get_setting($settings, 'GOOGLE_CLIENT_ID')); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('GOOGLE CLIENT SECRET')); ?></label>
											<input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET" value="<?php echo e(get_setting($settings, 'GOOGLE_CLIENT_SECRET')); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('GOOGLE REDIRECT URL')); ?></label>
											<input type="text" class="form-control" value="<?php echo e(url('login/google/callback')); ?>" readOnly="true">
										</div>
									</div>

								</div>
							</div>

							<br>
							<h5 class="header-title"><?php echo e(_lang('Facebook Login')); ?></h5>
							<div class="params-panel border border-dark p-3">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('Facebook Login')); ?></label>
											<select class="form-control select2 auto-select" data-selected="<?php echo e(get_setting($settings, 'facebook_login','disabled')); ?>" name="facebook_login" required>
												<option value="disabled"><?php echo e(_lang('Disable')); ?></option>
												<option value="enabled"><?php echo e(_lang('Enable')); ?></option>
											</select>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('FACEBOOK APP ID')); ?></label>					<a href="https://developers.facebook.com/apps" target="_blank" class="btn-link float-right"><?php echo e(_lang('GET API KEY')); ?></a>
											<input type="text" class="form-control" name="FACEBOOK_CLIENT_ID" value="<?php echo e(get_setting($settings, 'FACEBOOK_CLIENT_ID')); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('FACEBOOK APP SECRET')); ?></label>
											<input type="text" class="form-control" name="FACEBOOK_CLIENT_SECRET" value="<?php echo e(get_setting($settings, 'FACEBOOK_CLIENT_SECRET')); ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"><?php echo e(_lang('FACEBOOK REDIRECT URL')); ?></label>
											<input type="text" class="form-control" value="<?php echo e(url('login/facebook/callback')); ?>" readOnly="true">
										</div>
									</div>
								</div>
							</div>

							<br>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>

			<div id="google_recaptcha" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Google Recaptcha v3')); ?></h4>
					</div>

					<div class="card-body">
					    <form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-6">
								  	<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Enable Recaptcha v3')); ?></label>
											<select class="form-control auto-select" data-selected="<?php echo e(get_setting($settings, 'enable_recaptcha', 0)); ?>" name="enable_recaptcha" required>
											<option value="0"><?php echo e(_lang('No')); ?></option>
											<option value="1"><?php echo e(_lang('Yes')); ?></option>
										</select>
								  	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Site Key')); ?></label>
										<input type="text" class="form-control" name="recaptcha_site_key" value="<?php echo e(get_setting($settings, 'recaptcha_site_key')); ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Secret Key')); ?></label>
										<input type="text" class="form-control" name="recaptcha_secret_key" value="<?php echo e(get_setting($settings, 'recaptcha_secret_key')); ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="icofont-check-circled"></i> <?php echo e(_lang('Save Settings')); ?></button>
									</div>
								</div>
							</div>
					    </form>
				    </div>
				</div>
			</div>

			<div id="cron_jobs" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Cron Jobs')); ?></h4>
					</div>

					<div class="card-body">
					    <form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-12">
								  	<div class="form-group">
										<label class="control-label"><?php echo e(_lang('Cron Jobs URL')); ?> (<b><?php echo e(_lang('Run every 12 hours')); ?></b>)</label>
										<input type="text" class="form-control" value="wget -O- <?php echo e(url('console/run')); ?> >> /dev/null" readOnly>
								  	</div>
								</div>
							</div>
					    </form>
				    </div>
				</div>
			</div>

			<div id="logo" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Logo and Favicon')); ?></h4>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.uplaod_logo')); ?>" enctype="multipart/form-data">
									<?php echo e(csrf_field()); ?>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label"><?php echo e(_lang('Upload Logo')); ?></label>
												<input type="file" class="form-control dropify" name="logo" data-max-file-size="8M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="<?php echo e(get_logo()); ?>" required>
											</div>
										</div>

										<br>
										<div class="col-md-12">
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-block"><?php echo e(_lang('Upload')); ?></button>
											</div>
										</div>
									</div>
								</form>
							</div>

							<div class="col-md-6">
								<form method="post" class="settings-submit params-panel" autocomplete="off" action="<?php echo e(route('settings.update_settings','store')); ?>" enctype="multipart/form-data">
									<?php echo e(csrf_field()); ?>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label"><?php echo e(_lang('Upload Favicon')); ?> (PNG)</label>
												<input type="file" class="form-control dropify" name="favicon" data-max-file-size="2M" data-allowed-file-extensions="png" data-default-file="<?php echo e(get_favicon()); ?>" required>
											</div>
										</div>

										<br>
										<div class="col-md-12">
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-block"><?php echo e(_lang('Upload')); ?></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!--End Logo Tab-->


			<div id="cache" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h4 class="header-title"><?php echo e(_lang('Cache Control')); ?></h4>
					</div>

					<div class="card-body">
						<form method="post" class="params-panel" autocomplete="off" action="<?php echo e(route('settings.remove_cache')); ?>">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-md-12">
									<div class="checkbox">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="cache[view_cache]" value="view_cache" id="view_cache">
											<label class="custom-control-label" for="view_cache"><?php echo e(_lang('View Cache')); ?></label>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="checkbox">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="cache[application_cache]" value="application_cache" id="application_cache">
											<label class="custom-control-label" for="application_cache"><?php echo e(_lang('Application Cache')); ?></label>
										</div>
									</div>
								</div>

								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><?php echo e(_lang('Remove Cache')); ?></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!--End Cache Tab-->

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/backend/administration/general_settings/settings.blade.php ENDPATH**/ ?>