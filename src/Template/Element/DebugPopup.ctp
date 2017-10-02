<?php //if (AuthComponent::user('role') == 'admin') { ?>

	<?php if (!isset($label)) $label = "Info"; ?>

	<div class="btn-group">

		<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			Debug: <?php echo $label; ?> <span class="caret"></span>
		</button>

		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		<li>
			<div class="panel">
				<div class="panel-heading">
					<h5 class="panel-title"><?php echo $label; ?></h5>
				</div>
				<?php pr( $varToDisplay ) ?>
			</div>
		</li>
		</ul>

	</div>

<?php //} ?>
