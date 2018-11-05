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

use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<?php echo $this->Html->docType('html5'); ?>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="KUmaMmX_cP8Boq7IHsrSV8XhqIB-PZHHA3VGGeqq7vQ" />

    <title>
        <?= $this->fetch('title') ?> | Sponsors Goodat
    </title>

    <?= $this->Html->meta('icon') ?>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/ico/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/img/ico/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/img/ico/favicon-16x16.png">
    <meta name='robots' content='noindex,nofollow' />

    <?= $this->Html->css('uikit.min') ?>
    <?= $this->Html->css('custom') ?>

    <?= $this->Html->script('uikit.min') ?>
    <?= $this->Html->script('uikit-icons.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body class="<?php echo ($this->request->here == $this->request->webroot) ? 'homepage':''; echo (($this->request->here == $this->request->webroot) && $isMob) ? ' mob-homepage':''; ?>">

    <div class="uk-container-header">
        <div class="uk-container">
            <div class="uk-position-relative uk-padding-smaller">
                <div>
                    <div id="logo">
                        <a class="uk-logo" href="<?= $this->request->webroot ?>"><img width="270" src="/img/logo/beta.sponsors.goodat.png" alt="sponsors.goodat"></a>
                    </div>
                    <?php if($isLoggedIn) echo $this->element('Menu/main_menu'); ?>
                </div>

                <?php if(!$isLoggedIn): ?>
                    <div id="login" class="bg-orange uk-padding-small uk-height-1-1 uk-position-top-right uk-width-smaller">
                        <div class="uk-position-center">
                            <?= $this->Html->link('LOGIN', ['controller' => 'Users', 'action' => 'login'], ['class' => 'uk-display-inline-block txt-white']); ?>
                            <i class="uk-display-inline-block txt-white" uk-icon="icon:sign-in"></i>
                        </div>
                    </div>
                <?php elseif($isLoggedIn): ?>
                    <div class="headerbar uk-position-right">
                        <?php echo $this->element('Menu/top_menu', ['badges' => null]); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div id="flash-content">
        <?= $this->Flash->render() ?>
        <?= $this->Flash->render('auth') ?>
    </div>

    <div class="uk-container">

        <section id="content" class="uk-margin-small-top uk-margin-large-bottom">
            <?= $this->fetch('content') ?>
        </section>

    </div>

    <footer class="uk-padding-small uk-text-center">
        <div class="uk-container">
            <p>©2018 Goodat. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
