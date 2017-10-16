<?php
	
	$navHeaderOn = (strlen($this->fetch('navHeader')) > 0);
	$ajaxActionsOn = $this->request->is('ajax') && (strlen($this->fetch('ajaxActions')) > 0);
	$dropdownActionsOn = (!$this->request->is('ajax')) && (strlen($this->fetch('dropdownActions')) > 0);
	
?>

<div class="row">

	<div class="col-md-8">
		<h1 style="margin-top: 10px;"><?php echo $this->fetch('title'); ?></h1>
	</div>

	<div class="col-md-4">

		<?php 
			if ($navHeaderOn) { 
				echo $this->fetch('navHeader');
			} else if ($ajaxActionsOn) {
		?>
				<div class="dropdown pull-right">

					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						Actions <span class="caret"></span>
					</button>

					<ul class="dropdown-menu  dropdown-menu-right" role="menu">
						<?php echo $this->fetch('ajaxActions'); ?>
					</ul>

				</div>
				
		<?php } else if ($dropdownActionsOn) { ?>

				<div class="dropdown pull-right">

					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						Actions <span class="caret"></span>
					</button>

					<ul class="dropdown-menu  dropdown-menu-right" role="menu">
						<?php echo $this->fetch('dropdownActions'); ?>
					</ul>

				</div><!-- end dropdown -->

		<?php } ?>
	
	</div>

	<?php if ($this->request->is('ajax')) { ?>

		<?php if (strlen($this->fetch('ajaxActions'))) { ?>

			
		<?php } ?>
		
	<?php } else if (strlen($this->fetch('dropdownActions'))) { ?>


	<?php } // not ajax ?>

</div><!-- end row -->

<?php echo $this->fetch('content'); ?>
