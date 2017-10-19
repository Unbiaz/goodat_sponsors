<div class="row">

	<div class="col-md-12">

<!-- 		<h1>Employer paying data on Goodat</h1> -->
<!-- 		<h4>Description of Goodat data companies</h4> -->
		
	</div>
	
</div>

<div class="row">

	<div class="col-md-3">


	</div>

	<div class="col-md-1">

	</div> 
	
	
	


	<div class="col-md-3">

		<?= $this->Form->create(null, ['class' => 'form-horizontal', 'role' => 'form']) ?>

		<div class="text-center"> <h3><?= __('Please log in') ?></h3> </div> <hr />

	 	<div class="jumbotron">
			<div class="form-group text-left">
				<?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Enter email', 'label' => 'Email']); ?>
			</div> </br>

			<div class="form-group text-left">
				<?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Enter password', 'label' => 'Password']); ?>
			</div></br>

			<div class="form-group label-link text-left">
				<?= $this->Form->button('Log In', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
				<div> 
                    <label for="login" class="label-link">
                            <?= $this->Html->link(__('Sign Up'), ['action' => 'add']) ?></li>
                    </label>?
                </div>
				<div class="text-right"> 
					<label for="password" class="label-link">
						<?= $this->Html->link(__('Forgot password'), ['action' => 'forgotPassword']) ?></li>
		           	</label>
	           </div>
			</div>
		</div>
			<?= $this->Form->end() ?><hr />
		

	</div>
	
</div>