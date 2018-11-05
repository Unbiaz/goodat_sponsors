<?php
/**
  * @var \App\View\AppView $this
  */
echo $this->Html->css('jquery.datetimepicker.min');
echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js');
echo $this->Html->script('jquery.datetimepicker.full.min');

echo $this->Html->css('jquery-te-1.4.0.min');
echo $this->Html->script('jquery-te-1.4.0.min');

echo $this->Html->css('chosen.min');
echo $this->Html->script('chosen.jquery.min');

?>

<h4 class="uk-margin-small-bottom uk-text-center txt-green">Edit Job</h4>

<div class="uk-panel uk-padding-small bg-green">
    <?= $this->Form->create($job, ['class' => 'uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m', 'uk-grid'=>'']) ?>

        <?= $this->Form->control('title', ['type'=>'text', 'class' => 'uk-input uk-form-small', 'label' => 'Title of job', 'placeholder' => 'Enter a title']);?>

        <?= $this->Form->control('cmpny_id', ['type'=>'select', 'class'=>'uk-select uk-form-small chosen-select', 'options' => $companies, 'label' => 'Select company']);?>

        <?= $this->Form->control('area_id', ['type'=>'select', 'class'=>'uk-select uk-form-small chosen-select','options' => $functionalAreas, 'label' => 'Functional areas']);?>

        <?= $this->Form->control('location_id', ['type'=>'select', 'class'=>'uk-select uk-form-small chosen-select','options' => $locations, 'label' => 'Select location']);?>

        <?= $this->Form->control('contrat_id', ['type'=>'select', 'class'=>'uk-select uk-form-small chosen-select','options' => $contratTypes, 'label' => 'Job type']);?>

        <div class="">
            <p class="uk-margin-remove">Expirated</p>
            <div class="uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                <?= $this->Form->input('expirated', ['type'=>'text', 'id'=>'datetimepicker', 'class' => 'uk-input uk-form-small', 'label'=>'', 'value'=> date_format($job->created, 'Y-m-d H:i:s')]); ?>
            </div>
        </div>

        <?= $this->Form->control('link', ['type'=>'text', 'class' => 'uk-input uk-form-small', 'label' => 'Link of job']);?>

        <div class="uk-width-1-1">
        <?= $this->Form->control('description', ['class' => 'editor uk-input uk-form-small', 'label' => 'Description of job']);?>
        </div>

        <div class=" uk-width-1-1">
            <?= $this->Form->control('shortage', ['class' => 'uk-checkbox uk-margin-small-right', 'label' => 'Skills shortage ?']);?>
        </div>

        <div class="uk-width-1-1 uk-text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
        </div>
 

    <?= $this->Form->end() ?>
</div>
<script>

    $( function(){
        $( '#datetimepicker').datetimepicker({
            format:'Y-m-d H:i:s',
            lang:'en'
        }); 
        $('.editor').jqte({
            format:false,
            fsize:false,
            color:false
        });
        
        $('.chosen-select').chosen();
    } );
</script>
