<div class="sb-sidenav-menu-heading"><?php echo e(_lang('NAVIGATIONS')); ?></div>

<a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-dashboard-web"></i></div>
	<?php echo e(_lang('Dashboard')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-users-alt-3"></i></div>
	<?php echo e(_lang('Users')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="users" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('users.create')); ?>"><?php echo e(_lang('Add New')); ?></a>
		<a class="nav-link" href="<?php echo e(route('users.index')); ?>"><?php echo e(_lang('All Users')); ?></a>
		<?php if(get_option('enable_kyc') == 'yes'): ?>
		<a class="nav-link" href="<?php echo e(route('users.documents')); ?>">
			<?php echo e(_lang('KYC Documents')); ?>

			<?php echo xss_clean(kyc_count()); ?>

		</a>
		<?php endif; ?>
		<a class="nav-link" href="<?php echo e(route('users.filter')); ?>/email_verified"><?php echo e(_lang('Email Verified')); ?></a>
		<a class="nav-link" href="<?php echo e(route('users.filter')); ?>/sms_verified"><?php echo e(_lang('SMS Verified')); ?></a>
		<a class="nav-link" href="<?php echo e(route('users.filter')); ?>/email_unverified"><?php echo e(_lang('Email Unverified')); ?></a>
		<a class="nav-link" href="<?php echo e(route('users.filter')); ?>/sms_unverified"><?php echo e(_lang('SMS Unverified')); ?></a>
	</nav>
</div>

<?php if(get_option('send_money_action', 0) == 1 || get_option('exchange_money_action', 0) == 1): ?>
<a class="nav-link" href="<?php echo e(route('internal_transfer_requests.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-info-square"></i></div>
	<?php echo e(_lang('Transfer Requests')); ?>

	<?php echo xss_clean(request_count('internal_transfer_requests',true)); ?>

</a>
<?php endif; ?>

<a class="nav-link" href="<?php echo e(route('transfer_requests.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-bank-transfer-alt"></i></div>
	<?php echo e(_lang('Wire Transfers')); ?>

	<?php echo xss_clean(request_count('wire_transfer_requests',true)); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deposit" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-plus-square"></i></div>
	<?php echo e(_lang('Deposit')); ?>

	<?php echo xss_clean(request_count('deposit_requests',true)); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="deposit" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('deposit_requests.index')); ?>"><?php echo e(_lang('Deposit Request')); ?></a>
		<a class="nav-link" href="<?php echo e(route('deposits.create')); ?>"><?php echo e(_lang('Make Deposit')); ?></a>
		<a class="nav-link" href="<?php echo e(route('deposits.index')); ?>"><?php echo e(_lang('Deposit History')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdraw" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-minus-square"></i></div>
	<?php echo e(_lang('Withdraw')); ?>

	<?php echo xss_clean(request_count('withdraw_requests',true)); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="withdraw" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('withdraw_requests.index')); ?>"><?php echo e(_lang('Withdraw Request')); ?></a>
		<a class="nav-link" href="<?php echo e(route('withdraw.create')); ?>"><?php echo e(_lang('Make Withdraw')); ?></a>
		<a class="nav-link" href="<?php echo e(route('withdraw.index')); ?>"><?php echo e(_lang('Withdraw History')); ?></a>
	</nav>
</div>

<a class="nav-link" href="<?php echo e(route('transactions.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-listing-number"></i></div>
	<?php echo e(_lang('All Transactions')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#loans" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-dollar-minus"></i></div>
	<?php echo e(_lang('Loan Management')); ?>

	<?php echo xss_clean(request_count('pending_loans',true)); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="loans" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('loans.index')); ?>"><?php echo e(_lang('All Loans')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loans.admin_calculator')); ?>"><?php echo e(_lang('Loan Calculator')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loans.create')); ?>"><?php echo e(_lang('Add New Loan')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loan_products.index')); ?>"><?php echo e(_lang('Loan Products')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loan_payments.index')); ?>"><?php echo e(_lang('Loan Repayments')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fdr" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-money"></i></div>
	<?php echo e(_lang('Fixed Deposit')); ?>

	<?php echo xss_clean(request_count('fdr_requests',true)); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="fdr" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('fixed_deposits.create')); ?>"><?php echo e(_lang('Add New')); ?></a>
		<a class="nav-link" href="<?php echo e(route('fixed_deposits.index')); ?>"><?php echo e(_lang('All FDR')); ?></a>
		<a class="nav-link" href="<?php echo e(route('fdr_plans.index')); ?>"><?php echo e(_lang('FDR Packages')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gift_card" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-gift"></i></div>
	<?php echo e(_lang('Gift Cards')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="gift_card" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('gift_cards.index')); ?>"><?php echo e(_lang('Gift Cards')); ?></a>
		<a class="nav-link" href="<?php echo e(route('gift_cards.filter','used_gift_card')); ?>"><?php echo e(_lang('Used Gift Card')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tickets" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-live-support"></i></div>
	<?php echo e(_lang('Support Tickets')); ?>

	<?php echo xss_clean(request_count('pending_tickets',true)); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="tickets" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('support_tickets.index',['status' => 'active'])); ?>"><?php echo e(_lang('Active Tickets')); ?></a>
		<a class="nav-link" href="<?php echo e(route('support_tickets.index',['status' => 'pending'])); ?>"><?php echo e(_lang('Pending Tickets')); ?></a>
		<a class="nav-link" href="<?php echo e(route('support_tickets.index',['status' => 'closed'])); ?>"><?php echo e(_lang('Closed Tickets')); ?></a>
	</nav>
</div>

<div class="sb-sidenav-menu-heading"><?php echo e(_lang('System Settings')); ?></div>

<a class="nav-link" href="<?php echo e(route('branches.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-site-map"></i></div>
	<?php echo e(_lang('Branches')); ?>

</a>

<a class="nav-link" href="<?php echo e(route('other_banks.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-bank"></i></div>
	<?php echo e(_lang('Other Banks')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-chart-line-alt"></i></div>
	<?php echo e(_lang('Reports')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="reports" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('reports.transactions_report')); ?>"><?php echo e(_lang('Transactions Reports')); ?></a>
		<a class="nav-link" href="<?php echo e(route('reports.loan_report')); ?>"><?php echo e(_lang('Loan Reports')); ?></a>
		<a class="nav-link" href="<?php echo e(route('reports.fdr_report')); ?>"><?php echo e(_lang('FDR Reports')); ?></a>
		<a class="nav-link" href="<?php echo e(route('reports.bank_revenues')); ?>"><?php echo e(_lang('Bank Revenues')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#systemUsers" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-users-alt-4"></i></div>
	<?php echo e(_lang('System Users')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="systemUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('system_users.index')); ?>"><?php echo e(_lang('All Users')); ?></a>
		<a class="nav-link" href="<?php echo e(route('roles.index')); ?>"><?php echo e(_lang('User Roles')); ?></a>
		<a class="nav-link" href="<?php echo e(route('permission.index')); ?>"><?php echo e(_lang('Access Control')); ?></a>
	</nav>
</div>

<a class="nav-link" href="<?php echo e(route('currency.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-euro"></i></div>
	<?php echo e(_lang('Currency List')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deposit_settings" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-credit-card"></i></div>
	<?php echo e(_lang('Transactions Settings')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="deposit_settings" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('payment_gateways.index')); ?>"><?php echo e(_lang('Deposit Gateways')); ?></a>
		<a class="nav-link" href="<?php echo e(route('deposit_methods.index')); ?>"><?php echo e(_lang('Deposit Methods')); ?></a>
		<a class="nav-link" href="<?php echo e(route('withdraw_methods.index')); ?>"><?php echo e(_lang('Withdraw Methods')); ?></a>
		<a class="nav-link" href="<?php echo e(route('settings.system_settings')); ?>/transactions_fee"><?php echo e(_lang('Transactions Fee')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#websiteManagement" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-monitor"></i></div>
	<?php echo e(_lang('Website Management')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="websiteManagement" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('services.index')); ?>"><?php echo e(_lang('Services')); ?></a>
		<a class="nav-link" href="<?php echo e(route('faqs.index')); ?>"><?php echo e(_lang('FAQ')); ?></a>
		<a class="nav-link" href="<?php echo e(route('testimonials.index')); ?>"><?php echo e(_lang('Testimonials')); ?></a>
		<a class="nav-link" href="<?php echo e(route('teams.index')); ?>"><?php echo e(_lang('Teams')); ?></a>
		<a class="nav-link" href="<?php echo e(route('pages.index')); ?>"><?php echo e(_lang('Pages')); ?></a>
		<a class="nav-link" href="<?php echo e(route('navigations.index')); ?>"><?php echo e(_lang('Menu Management')); ?></a>
		<a class="nav-link" href="<?php echo e(route('theme_option.update')); ?>"><?php echo e(_lang('Theme Options')); ?></a>
	</nav>
</div>


<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administration" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-settings-alt"></i></div>
	<?php echo e(_lang('Administration')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>

<div class="collapse" id="administration" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('settings.update_settings')); ?>"><?php echo e(_lang('General Settings')); ?></a>
		<a class="nav-link" href="<?php echo e(route('email_templates.index')); ?>"><?php echo e(_lang('Email Templates')); ?></a>
		<a class="nav-link" href="<?php echo e(route('sms_templates.index')); ?>"><?php echo e(_lang('SMS Templates')); ?></a>
		<a class="nav-link" href="<?php echo e(route('database_backups.list')); ?>"><?php echo e(_lang('Database Backup')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#languages" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-world"></i></div>
	<?php echo e(_lang('Languages')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="languages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('languages.index')); ?>"><?php echo e(_lang('All Language')); ?></a>
		<a class="nav-link" href="<?php echo e(route('languages.create')); ?>"><?php echo e(_lang('Add New')); ?></a>
	</nav>
</div><?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/layouts/menus/admin.blade.php ENDPATH**/ ?>