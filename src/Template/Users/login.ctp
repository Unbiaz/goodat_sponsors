
    <style>

        #send{
            background-color: #ec933b;
            color: white;
        }

        #labelPE{
            color: white;
        }

        .jumbotron{
            background-color: #48c2c5;
        }


    </style>

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
			<div class="form-group text-left" id="labelPE">
				<?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Enter email', 'label' => 'Email']); ?>
			</div> </br>

			<div class="form-group text-left" id="labelPE">
				<?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Enter password', 'label' => 'Password']); ?>
			</div></br>

			<div class="form-group label-link text-left">
				<?= $this->Form->button('Log In', ['type' => 'submit','id'=>'send', 'class' => 'btn']); ?>
			</div>

			<div class="form-group label-link">
				<div class="text-right" > 
					<div class="text-left"> 
		                <label for="login" class="label-link">
		                    <?= $this->Html->link(__('Sign Up ?'), ['action' => 'add']) ?>
		                </label>
	            	</div>
	            	
					<label for="password" class="label-link">
						<em><?= $this->Html->link(__('Forgot password ?'), ['action' => 'forgotPassword']) ?></em>
							<!-- <a href="/pages/home" class="button" target="_blank">Enter</a> -->
			        </label>
		        </div>
	        </div>

		</div>
			<?= $this->Form->end() ?><hr />
		

	</div>
	
</div>