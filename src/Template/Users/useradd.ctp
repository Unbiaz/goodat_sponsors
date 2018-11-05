<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$this->start('title');
echo 'Get access to Employers';
$this->end();

 ?>
<div class="uk-margin-large-top uk-margin-large-bottom">
    <div class="uk-text-center">
        <h4 class="uk-padding-large-top uk-margin-small-bottom">For UK International Students</h4>
        <h1 class="homepage-title uk-margin-small-top">
            <span class="txt-green">Find</span> an Emerging Technology Job </BR> after your Studies
        </h1>
        <h4 class="uk-margin-large-bottom uk-margin-small-top">
            <?php if(false) { ?> <span class="txt-green">Sponsorable</span> jobs -<?php } ?>
<?= $this->Html->link('<span class="txt-green">Top </span><span class="txt-white">Industry 4.0 firms - </span>', ['controller'=>'Companies', 'action' => 'index'], ['escape'=>false]); ?> 

<span class="txt-green">Sponsorable</span> Jobs – <span class="txt-green">Advisory</span> services
        </h4>
    </div>
    <h4 class="homepage-subtitle uk-padding-medium-top">Please Sign Up</h4>

    <div class="uk-panel uk-padding-small bg-green-light">

        <?= $this->Form->create($user, ['id'=>'home-login', 'class' => 'uk-grid-small', 'role' => 'form', 'uk-grid'=>'']) ?>

                <div class="uk-child-width-1-3@s uk-width-expand@s uk-grid-small" uk-grid>
                    <?= $this->Form->input('username', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Pick a username', 'label' => 'Username', 'required' => true]); ?>

                    <?= $this->Form->input('email', ['class' => 'uk-input uk-form-small', 'placeholder' => 'you@example.com', 'label' => 'Email', 'required' => true]); ?>

                    <?= $this->Form->input('password', ['class' => 'uk-input uk-form-small', 'placeholder' => 'Create a password', 'label' => 'Password' ,'required' => true]); ?>
                </div>
               
                <div class="uk-width-auto@s min-height">
                    <div class="uk-position-relative uk-width-small uk-height-1-1">
                        <?= $this->Form->button('Sign Up', ['type' => 'submit', 'class' => 'uk-button uk-button-primary uk-button-small uk-width-1-1 bg-orange txt-white uk-position-bottom']); ?>
                    </div>
                </div>

        <?= $this->Form->end() ?>
        
        <?= $this->Html->link(__('Already have an account ?'), ['action' => 'login'], ['class' => 'uk-float-right uk-margin-small-top txt-white']) ?>

    </div>
</div>




