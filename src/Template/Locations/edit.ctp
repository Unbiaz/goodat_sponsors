<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h4 class="uk-margin-small-bottom uk-text-center txt-green">Edit Location</h4>

<div class="uk-panel uk-padding-small bg-green uk-width-1-3@s uk-width-2-5@m uk-container-center">

    <?= $this->Form->create($location, ['class' => 'uuk-grid-small uk-child-width-1-1', 'uk-grid'=>'']) ?>

        <?= $this->Form->control('name', ['class' => 'uk-input uk-form-small', 'label' => 'Location']);?>

    <div class="uk-width-1-1 uk-text-center"> 
        <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
    </div>

    <?= $this->Form->end() ?>
</div>
