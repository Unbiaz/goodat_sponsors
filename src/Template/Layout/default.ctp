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
$cakeDescription = 'GoodAt';
$showSQL = false;
$debugSQL = true;
$goodAtTheme = false;

//if ($debugSQL && (AuthComponent::user('role') == 'admin' || AuthComponent::user('username') == 'ricktest')) {
    $showSQL = true;
//}

?>
<?php echo $this->Html->docType('html5'); ?>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="this-is-bootstrap.ctp" content="yes">

    <title>
        <? //= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <? // --------------------- CSS Block --------------------- // ?>

    <?= $goodAtTheme ? $this->Html->css('bootstrap-custom') : $this->Html->css('bootstrap.min'); ?>

    <?= $this->Html->css('sticky-footer'); ?>
    <?= $this->Html->css('datepicker'); ?>
    <?= $this->Html->css('jquery.dataTables'); ?>
    <?= $this->Html->css('https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css'); ?>
    <?= $this->Html->css('chosen.min'); ?>
    <?= $this->Html->css('bootstrap-datetimepicker.min'); ?>

    <?= $this->fetch('css') ?>

    <? // --------------------- Script Block --------------------- // ?>

    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->Html->script('jquery-ui.min'); ?>
    <?= $this->Html->script('jquery.ui.touch-punch.min'); ?>
    
    <? // https://datatables.net ?>
    <?= $this->Html->script('jquery.dataTables.min'); ?>
    <?= $this->Html->script('https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.js'); ?>
    
    <? // http://www.appelsiini.net/projects/jeditable ?>
    <?= $this->Html->script('jeditable'); ?>

    <? // http://momentjs.com/docs/#/displaying/ ?>
    <?= $this->Html->script('moment.min'); ?>

    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('bootstrap-datepicker'); ?>
    <?= $this->Html->script('bootstrap-datetimepicker.min'); ?>

    <?= $this->Html->script('dataTables.bootstrap'); ?>
    
    <?= $this->Html->script('rsc-functions'); ?>
    
    <? // https://harvesthq.github.io/chosen/ ?>
    <?= $this->Html->script('chosen.jquery'); ?>

    <?= $this->fetch('script') ?>

</head>
<body>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <?php echo $this->element('Menu/top_menu', array('badges' => null)); ?>
        </div><!-- container -->
    </nav><!-- /.navbar navbar-default -->

    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>


    <section class="container-fluid clearfix">
        <?= $this->fetch('content') ?>
    </section>

    <script type="text/javascript">
        $(function() {
            $("#tabs").tabs();
            $('.datepicker').datepicker({
                 Format: 'dd-mm-yyyy'
             });
            $('.datetimepicker').datetimepicker();
        });

        $('body').on('hidden.bs.modal', '#myModal', function () {
            $(this).removeData('bs.modal');
            $(this).find('.modal-content')
                   .html("<div class='modal-body'><h3>Loading...</h3><h5>If this message persists, check you are still logged in and if you have permission to view this page!</h5></div>");
        });

        $('#myModal').on('loaded.bs.modal', function (e) {
            //console.log('loaded modal');
            $('.modal-content').prepend('<button type="button" class="close btn btn-xs" data-dismiss="modal" aria-label="Close">Close <span aria-hidden="true">&times;</span></button>');
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    </script>

    <div class="container">
        <?php echo $this->element('modalDialog'); ?>
    </div><!-- /#content .container -->

    <footer>
    </footer>
</body>
</html>
