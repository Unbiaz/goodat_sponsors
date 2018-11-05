<?php 

	$this->start('title');
	echo 'Reset password';
	$this->end();

 ?>

<h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Change password</h4> 

<div class="uk-panel uk-padding-small bg-green uk-width-1-2@s uk-width-2-5@m uk-container-center">

	<?= $this->Form->create(null, ['class' => 'uk-grid-small uk-child-width-1-1', 'role' => 'form', 'uk-grid'=>'']) ?>

		<p class="uk-text-center txt-white">Enter your new password</p>

		<?= $this->Form->input('password', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a new password', 'label' => 'New password', 'required'=>'required']); ?>

		<?= $this->Form->input('password2', ['type' => 'password','class' => 'uk-input uk-form-small', 'placeholder' =>'Retype password' ,'label' => 'Confirm password', 'required'=>'required']); ?>


		<div class="uk-text-center">
			<?= $this->Form->button('Change password', ['type' => 'submit', 'id'=>'send', 'class' => 'uk-button uk-button-primary uk-button-small uk-width-auto bg-orange txt-white']); ?>
		</div>

			<?= $this->Form->end() ?>
	
</div>