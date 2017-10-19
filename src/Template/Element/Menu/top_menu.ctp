<?php

?>

<div class="navbar-header">

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button><!-- /.navbar-toggle -->

</div><!-- /.navbar-header -->

<div class="collapse navbar-collapse navbar-ex1-collapse">

	<ul class="nav navbar-nav">
		<!-- <li <?php echo strcasecmp($this->request->params['controller'], 'Users') ? '' : 'class="active"'; ?> >
			<?= $this->Html->link(__('Home'), ['controller' => 'Users', 'action' => 'add']); ?>
		</li> -->

		<?php if ($isLoggedIn) { ?>
			<li <?php echo strcasecmp($this->request->params['controller'], 'Companies') ? '' : 'class="active"'; ?> >
				<!--<?= $this->Html->link(__('Companies'), ['controller' => 'Companies', 'action' => 'view']); ?>-->
			</li>
		<?php } ?>

	</ul><!-- /.nav navbar-nav -->

	<ul class="nav navbar-nav navbar-right">

<!-- 		<li <?php echo strcasecmp($this->request->params['controller'], 'Pages') ?> >
			<?= $this->Html->link(__('SignUp'), ['controller' => 'Users', 'action' => 'add']); ?>
		</li> -->

		<?php if ($isAdmin) { ?>
		
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
				<ul class="dropdown-menu">

					<li class="divider"></li>
					<li class="dropdown-header">Companies</li>
					<li class="divider"></li>
					    <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
					    <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>

					<li class="divider"></li>
					<li class="dropdown-header">Industries</li>
					<li class="divider"></li>
					    <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industries', 'action' => 'add']) ?></li>
					    <li><?= $this->Html->link(__('List Industries'), ['controller' => 'Industries', 'action' => 'index']) ?></li>

					<li class="divider"></li>
					<li class="dropdown-header">Payements</li>
					<li class="divider"></li>
					    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>

					<li class="divider"></li>
					<li class="dropdown-header">Users</li>
					<li class="divider"></li>
					    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                        <!-- <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->

				</ul>
			</li>
			
		<?php } ?>

		<?php if ($isLoggedIn) { ?>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Logout <b class="caret"></b></a>
				<ul class="dropdown-menu">

					<li class="dropdown-header"><?= $username ?></li>

					<li class="divider"></li>
					<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']); ?></li>
				</ul>
			</li>

		<?php } else { ?>

			<li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']); ?></li>

		<?php } ?>

	</ul><!-- /.nav navbar-nav navbar-right-->

</div><!-- /.navbar-collapse -->

