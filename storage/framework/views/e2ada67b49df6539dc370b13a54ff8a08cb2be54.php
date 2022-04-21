<div class="sb-sidenav-menu-heading"><?php echo e(_lang('NAVIGATIONS')); ?></div>

<a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-dashboard-web"></i></div>
	<?php echo e(_lang('Dashboard')); ?>

</a>

<a class="nav-link" href="<?php echo e(route('transfer.send_money')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-location-arrow"></i></div>
	<?php echo e(_lang('Send Money')); ?>

</a>

<a class="nav-link" href="<?php echo e(route('transfer.exchange_money')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-exchange"></i></div>
	<?php echo e(_lang('Exchange Money')); ?>

</a>

<a class="nav-link" href="<?php echo e(route('transfer.wire_transfer')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-bank-transfer"></i></div>
	<?php echo e(_lang('Wire Transfer')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_request" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-credit-card"></i></div>
	<?php echo e(_lang('Payment Request')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="payment_request" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('payment_requests.create')); ?>"><?php echo e(_lang('New Request')); ?></a>
		<a class="nav-link" href="<?php echo e(route('payment_requests.index')); ?>"><?php echo e(_lang('All Requests')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deposit" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-plus-circle"></i></div>
	<?php echo e(_lang('Deposit Money')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="deposit" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('deposit.automatic_methods')); ?>"><?php echo e(_lang('Automatic Deposit')); ?></a>
		<a class="nav-link" href="<?php echo e(route('deposit.manual_methods')); ?>"><?php echo e(_lang('Manual Deposit')); ?></a>
		<a class="nav-link" href="<?php echo e(route('deposit.redeem_gift_card')); ?>"><?php echo e(_lang('Redeem Gift Card')); ?></a>
	</nav>
</div>

<a class="nav-link" href="<?php echo e(route('withdraw.manual_methods')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-minus-circle"></i></div>
	<?php echo e(_lang('Withdraw Money')); ?>

</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#loans" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-dollar-minus"></i></div>
	<?php echo e(_lang('Loans')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="loans" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('loans.apply_loan')); ?>"><?php echo e(_lang('Apply New Loan')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loans.my_loans')); ?>"><?php echo e(_lang('My Loans')); ?></a>
		<a class="nav-link" href="<?php echo e(route('loans.calculator')); ?>"><?php echo e(_lang('Loan Calculator')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fdr" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-money"></i></div>
	<?php echo e(_lang('Fixed Deposit')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="fdr" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('fixed_deposits.apply')); ?>"><?php echo e(_lang('Apply New FRD')); ?></a>
		<a class="nav-link" href="<?php echo e(route('fixed_deposits.history')); ?>"><?php echo e(_lang('FDR History')); ?></a>
	</nav>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tickets" aria-expanded="false" aria-controls="collapseLayouts">
	<div class="sb-nav-link-icon"><i class="icofont-live-support"></i></div>
	<?php echo e(_lang('Support Tickets')); ?>

	<div class="sb-sidenav-collapse-arrow"><i class="icofont-rounded-down"></i></div>
</a>
<div class="collapse" id="tickets" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
	<nav class="sb-sidenav-menu-nested nav">
		<a class="nav-link" href="<?php echo e(route('tickets.create_ticket')); ?>"><?php echo e(_lang('Create New Ticket')); ?></a>
		<a class="nav-link" href="<?php echo e(route('tickets.my_tickets',['status' => 'pending'])); ?>"><?php echo e(_lang('Pending Tickets')); ?></a>
		<a class="nav-link" href="<?php echo e(route('tickets.my_tickets',['status' => 'active'])); ?>"><?php echo e(_lang('Active Tickets')); ?></a>
		<a class="nav-link" href="<?php echo e(route('tickets.my_tickets',['status' => 'closed'])); ?>"><?php echo e(_lang('Closed Tickets')); ?></a>
	</nav>
</div>

<a class="nav-link" href="<?php echo e(route('customer_reports.transactions_report')); ?>">
	<div class="sb-nav-link-icon"><i class="icofont-chart-histogram"></i></div>
	<?php echo e(_lang('Transactions Report')); ?>

</a>
<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/layouts/menus/customer.blade.php ENDPATH**/ ?>