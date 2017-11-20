<?php
$this->extend('/Common/view');

/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
  */

use Cake\Core\Plugin;
use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Route\DashedRoute;

?>

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Industries'), ['controller' => 'Industries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industries', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<style>
  table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }

  td, th {
      border: 2px solid #87CEFA;
      text-align: left;
      padding: 8px;
  }

  th {
      color: #48c2c5;
  }

  a{
      color: #4169E1;
  }

  tr:nth-child(even) {
      background-color: #48c2c5;
  }
</style>

<div class="btn-group btn-info pull-right">
  <button type="button" class="btn btn-default"><?= $this->Html->link('All industries', ['action' => 'index']); ?></button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">    <span class="caret"></span>
   <span class="sr-only">Toggle Dropdown</span>
  </button>
<!-- 
   <ul>
      <li><a href = "#">Action</a></li>

   </ul> -->

  <?php
   $tab_indus= [];
   foreach ($industries as $industry) {
      array_push($tab_indus, $this->Html->link($industry->categori_indus, ['action' => 'category',$industry->id_indus]));
  } ?>

    
  <?= $this->Html->nestedList($tab_indus, ['tag'=>'ul', 'class'=>'dropdown-menu']); ?>

</div> </br></br>


<!--             <?php
            $this->Html->link(['options' => $companies->Industries ], ['action' => 'category']);
            ?> -->

        
               



<div class="companies index large-9 medium-8 columns content">
    <!-- <h3><?= __('Companies') ?></h3> -->
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                 <th scope="col"><?= $this->Paginator->sort('id_cmpny') ?></th> -->
                <th scope="col">Company</th>
                <th scope="col">Website</th>
                <th scope="col">Email address</th>
                <th scope="col">Location</th>
                <th scope="col">Industry</th>
                <th scope="col">Sponsor</th>
<!--                 <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
              <?php if ($isAdmin) { ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
            <tr>
<!--                 <td><?= $this->Number->format($company->id_cmpny) ?></td> -->
                <td><?= h($company->name_company) ?></td>
                <td><?= h($company->company_website) ?></td>
                <td><?= h($company->email) ?></td>
                <td><?= h($company->town_city) ?></td>
                <td><?= $company->has('industry') ? $this->Html->link($company->industry->categori_indus, ['controller' => 'Companies', 'action' => 'category', $company->industry->id_indus]) : '' ?></td>
                <!-- <td><?= h($company->sponsor) ?></td> -->
                <td><?= $company->sponsor ? __('Yes') : __('No'); ?></td>
               <!--  <td><?= h($company->created) ?></td>
                <td><?= h($company->modified) ?></td> -->
                <?php if ($isAdmin) { ?>
                  <td class="actions">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $company->id_cmpny]) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id_cmpny]) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id_cmpny], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id_cmpny)]) ?>
                  </td>
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
