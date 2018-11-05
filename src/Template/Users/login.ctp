<?php 

	$this->start('title');
	echo 'Log in to access';
	$this->end();

 ?>

<h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Please log in</h4>

<div class="uk-panel uk-padding-small bg-green uk-width-1-2@s uk-width-2-5@m uk-container-center">

	<?= $this->Form->create(null, ['class' => 'uk-grid-small uk-child-width-1-1', 'role' => 'form', 'uk-grid'=>'']) ?>

 	
			<?= $this->Form->input('email', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter email', 'label' => 'Email', 'required' => true]); ?>

		
			<?= $this->Form->input('password', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter password', 'label' => 'Password', 'required' => true]); ?>
		
			<div class="uk-text-center">
				<?= $this->Form->button('Log In', ['type' => 'submit', 'class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']); ?>
			</div>

	<?= $this->Form->end() ?>

	<ul class="uk-list uk-text-right">
		<li>
    		<?= $this->Html->link(__('Sign Up ?'), ['action' => 'useradd'], ['class'=>'txt-white']) ?>
		</li>
		<li>
			<?= $this->Html->link(__('Forgot password ?'), ['action' => 'forgotPassword'], ['class'=>'txt-white']) ?>
		</li>
	</ul>

</div>





		
