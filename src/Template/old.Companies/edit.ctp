<?php
/**
  * @var \App\View\AppView $this
  */

echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js');
echo $this->Html->css('chosen.min');
echo $this->Html->script('chosen.jquery.min');

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">Edit company</h4>

<div class="uk-panel uk-padding-small bg-green">
    <?= $this->Form->create($company, ['class' => 'uk-grid-small uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m', 'uk-grid'=>'']) ?>

        <?= $this->Form->control('name_company', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a name', 'label' => 'Name of company']); ?>
        <?= $this->Form->control('town_city', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a city']); ?>
        <?= $this->Form->control('company_website', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a website']); ?>
        <?= $this->Form->control('email', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter an email']); ?>
        <?= $this->Form->control('industri_id', ['options' => $industries, 'class' => 'uk-select uk-form-small chosen-select', 'label' => 'Type of company']); ?>
        <div class=" uk-width-1-1">
            <?= $this->Form->control('sponsor', ['class' => 'uk-checkbox uk-margin-small-right', 'label' => 'Is a sponsor ?', 'checked'=>'checked']); ?>
        </div>

        <div class="uk-width-1-1 uk-text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>

<script>
    $( function(){
        $(".chosen-select").chosen();
    } );
</script>