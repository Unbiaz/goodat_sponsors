<?php 

	$this->start('title');
	echo 'Forgot password';
	$this->end();

 ?>

<h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Reset your password</h4> 

<div class="uk-panel uk-padding-small bg-green uk-width-1-2@s uk-width-2-5@m uk-container-center">

	<?= $this->Form->create(null, ['class' => 'uk-grid-small uk-child-width-1-1', 'role' => 'form', 'uk-grid'=>'']) ?>

			
		<p class="uk-text-center txt-white">Enter your email address and we will send you link to reset your password</p>

			
		<?= $this->Form->input('email', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter email', 'label' => 'Email', 'required'=>'required']); ?>
			

		<div class="uk-text-center">
			<?= $this->Form->button('Send password reset email', ['type' => 'submit', 'class' => 'uk-button uk-button-primary uk-button-small uk-width-auto bg-orange txt-white']); ?>
		</div>
		
	<?= $this->Form->end() ?>
		
</div>