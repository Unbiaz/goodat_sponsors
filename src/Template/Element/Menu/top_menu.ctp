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
		<li <?php echo strcasecmp($this->request->params['controller'], 'Pages') ? '' : 'class="active"'; ?> >
			<?= $this->Html->link(__('Home'), ['controller' => 'Users', 'action' => 'add']); ?>
		</li>

	</ul><!-- /.nav navbar-nav -->

	<ul class="nav navbar-nav navbar-right">

<!-- 		<li <?php echo strcasecmp($this->request->params['controller'], 'Pages') ?> >
			<?= $this->Html->link(__('SignUp'), ['controller' => 'Users', 'action' => 'add']); ?>
		</li> -->

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

