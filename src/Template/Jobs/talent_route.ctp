<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="uk-width-4-5@s uk-container-center">
    <h4 class="uk-margin-small-bottom uk-margin-large-top uk-text-center txt-green">Ask our experienced former graduate entrepreneur team any question regarding the talent routes</h4>
    
    <div class="uk-width-4-5@m uk-width-3-5@l uk-container-center txt-black">
        <p class="uk-text-center">Get invaluable advice on how to:</p>
        <ul class="uk-text-left">
            <li>produce a business idea/plan that open doors for an entrepreneur visa</li>
            <li>develop killer core competencies and become a sought-after talent</li> 
        </ul>
    </div>

    <? if($isSubcriber || $isAdmin): ?>
        <div class="uk-panel uk-padding-small txt-green uk-width-4-5@s uk-container-center">
            <?= $this->Form->create(null, ['class' => 'uk-grid-small uk-child-width-1-1', 'uk-grid'=>'']) ?>

                <?= $this->Form->control('university', ['type'=>'text', 'class' => 'uk-input uk-form-small', 'label' => 'University', 'placeholder' => 'Enter your University name', 'required'=>'required']);?>

                <?= $this->Form->control('study_year', ['type'=>'text', 'class'=>'uk-input uk-form-small', 'label' => 'Year of study', 'required'=>'required']);?>

                <div class="uk-width-1-1">
                    <?= $this->Form->control('questions', ['type'=>'textarea', 'class'=>'uk-textarea uk-text-small', 'label' => 'Your questions', 'placeholder' => 'Type your questions here', 'required'=>'required']);?>
                </div>

                <div class="uk-width-1-1 uk-text-right">
                    <?= $this->Form->button(__('Submit'), ['class' => 'uk-button uk-button-primary uk-button-small uk-width-small bg-orange txt-white']) ?>
                </div>

            <?= $this->Form->end() ?>
        </div>
        
    <? elseif(!$isSubcriber): ?>
        
        <div class="uk-text-center">
            <h4 class="txt-orange uk-margin-small-top uk-margin-small-bottom">Upgrade to have full access to our ‘work prospects boost’ package.</h4>

            <?= $this->Html->link('go to subscribe', ['controller'=>'Users', 'action' => 'subscribe'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top uk-margin-bottom']); ?>
        </div>

    <? endif; ?>
</div>
