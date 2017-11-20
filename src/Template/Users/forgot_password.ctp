<style>

        #send{
            background-color: #ec933b;
            color: white;
        }

        .jumbotron{
            background-color: #48c2c5;
        }

</style>

<div class="row">

	<div class="col-md-3">


	</div>

	<div class="col-md-1">

	</div> 

	<div class="col-md-3">

		<?= $this->Form->create(null, ['class' => 'form-horizontal', 'role' => 'form']) ?>

		<div class="text-center"> <h3><?= __('Reset your password') ?></h3> </div> <hr />

	 	<div class="jumbotron">

			<div class="form-group text-center">
				<strong>Enter your email address and we will send you link to reset your password</strong>
			</div>

			<div class="form-group text-left">
				<?= $this->Form->input('email', ['name' => '','class' => 'form-control', 'placeholder' => 'Enter email', 'label' => 'Email']); ?>
			</div> </br>

			<div class="form-group label-link text-left">
				<?= $this->Form->button('Send password reset email', ['type' => 'submit','id'=>'send', 'class' => 'btn btn-large btn-block']); ?>
			</div>
		</div>
			<?= $this->Form->end() ?><hr />
		

	</div>
	
</div>