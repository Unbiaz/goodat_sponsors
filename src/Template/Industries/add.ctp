<?php
/**
  * @var \App\View\AppView $this
  */

echo $this->Html->css('jquery-te-1.4.0.min');
echo $this->Html->script('https://code.jquery.com/jquery.min.js');
echo $this->Html->script('jquery-te-1.4.0.min');

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Add new industry</h4>

<div class="uk-panel uk-padding-small bg-green uk-width-1-2@s uk-width-3-5@m uk-container-center">

  <?= $this->Form->create($industry, ['class' => 'uk-grid-small uk-child-width-1-1', 'uk-grid'=>'']) ?>

      <?= $this->Form->control('categori_indus', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Enter a name', 'label' => 'Name of industry', 'required' => true]); ?>
      <?= $this->Form->control('desc_indus', ['class' => 'editor', 'label' => 'Description of industry']); ?>

      <div class="uk-width-1-1 uk-text-center">
        <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
      </div>

  <?= $this->Form->end() ?>

</div>

<script>
    $( function(){ 
        $('.editor').jqte({
            format:false,
            fsize:false,
            color:false
        });
    } );
</script>
