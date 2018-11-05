<?php
/**
  * @var \App\View\AppView $this
  */

echo $this->Html->css('jquery.datetimepicker.min');
echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js');
echo $this->Html->script('jquery.datetimepicker.full.min');

echo $this->Html->css('chosen.min');
echo $this->Html->script('chosen.jquery.min');

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Add Payment</h4>

<div class="uk-panel uk-padding-small bg-green">
    <?= $this->Form->create($payment, ['class' => 'uk-grid-small uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m', 'uk-grid'=>'']) ?>
        
        <?= $this->Form->control('amount', ['type'=>'text', 'class' => 'uk-input uk-form-small', 'label' => 'Amount in £', 'placeholder' => 'Enter a amount', 'required' => true]); ?>

        <div class="">
            <p class="uk-margin-remove">Valid to</p>
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                <?= $this->Form->input('validTo', ['type'=>'text', 'id'=>'datetimepicker', 'class' => 'uk-input uk-form-small', 'label'=>'', 'required' => true]); ?>
            </div>
        </div>

        <?= $this->Form->control('user_id', ['type'=>'select', 'class'=>'uk-select uk-form-small chosen-select', 'options' => $users, 'label' => 'Select username', 'data-placeholder'=>'Choose user', 'empty'=>true]); ?>

    <div class="uk-width-1-1 uk-text-center">
    <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
    </div>

    <?= $this->Form->end() ?>
</div>
<script>
    $( function(){ 
        $( "#datetimepicker" ).datetimepicker();
        $(".chosen-select").chosen();
    } );
</script>
