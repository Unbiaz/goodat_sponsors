<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">Add new user</h4>

<div class="uk-panel uk-padding-small bg-green">
    <?= $this->Form->create($user, ['class' => 'uk-grid-small uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m', 'uk-grid'=>'']) ?>

        <?= $this->Form->control('username', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a username', 'required' => true]); ?>
        <?= $this->Form->control('email', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter an email', 'required' => true]); ?>
        <?= $this->Form->control('password', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a password', 'required' => true]); ?>
        <?= $this->Form->control('role', ['options' => [''=>'Editor', 'Admin'=>'Admin'], 'class' => 'uk-select uk-form-small', 'label' => 'Select role']); ?>

        <div class="uk-width-1-1 uk-text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
