<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Company $company
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id_cmpny]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id_cmpny], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id_cmpny)]) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Industries'), ['controller' => 'Industries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->id_cmpny) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name Company') ?></th>
            <td><?= h($company->name_company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($company->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Industry') ?></th>
            <td><?= $company->has('industry') ? $this->Html->link($company->industry->id_indus, ['controller' => 'Industries', 'action' => 'view', $company->industry->id_indus]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Cmpny') ?></th>
            <td><?= $this->Number->format($company->id_cmpny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= $company->sponsor ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
