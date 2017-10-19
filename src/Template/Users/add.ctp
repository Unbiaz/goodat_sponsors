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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<?php echo $this->Html->docType('html5'); ?>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>
        GoodAt Data Companies
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('bootstrap.min'); ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->fetch('script') ?>
    
</head>
<body>

<div class="users form large-9 medium-8 columns content">
    <div class="row">

            <div class="col-md-7"></br></br></br></br></br></br></br></br></br>

                <div >
    
                    <h1 style="font-size: 50px">Employer paying data on Goodat</h1>
                    <strong><p class="text-info" style="font-size: 20px">Phrase d'introduction ou d'accrochage</p></strong>

                </div>

            </div>

            <div class="col-md-1">


            </div>

            <div class="col-md-4 text-center">

                <?= $this->Form->create($user, ['class' => 'form-horizontal', 'role' => 'form']) ?>

                <div class="text-center"> <h3><?= __('Please Sign Up') ?></h3> </div> <hr />

                    <div class="jumbotron">

                        <div class="form-group text-left">
                            <?= $this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Pick a username', 'label' => 'Username', 'required' => true]); ?>
                        </div></br>
                        
                        <div class="form-group text-left">
                            <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'you@example.com', 'label' => 'Email', 'required' => true]); ?>
                        </div></br>

                        <div class="form-group text-left">
                            <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Create a password', 'label' => 'Password' ,'required' => true]); ?>
                        </div></br>

                     <!--    <div class="form-group text-left">
                            <?= $this->Form->input('role', ['type' => 'select', 'options' => $roleOptions, 'default' => 'user']) ?>
                        </div></br> -->

                        <div class="form-group text-left">
                            <?= $this->Form->button('Sign Up', ['type' => 'submit', 'class' => 'btn btn-large btn-block btn-success']); ?>
                        </div>

                        <div class="text-right"> 
                            <label for="login" class="label-link">
                                <?= $this->Html->link(__('Already an account'), ['action' => 'login']) ?></li>
                            </label>?
                        </div>
                        
                    </div>
                    <?= $this->Form->end() ?><hr />

                </div>
        </div>
    
</div>

    <footer>
    </footer>

</body>
</html>
