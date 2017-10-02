<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Industry $industry
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Industry'), ['action' => 'edit', $industry->id_indus]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Industry'), ['action' => 'delete', $industry->id_indus], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id_indus)]) ?> </li>
        <li><?= $this->Html->link(__('List Industries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="industries view large-9 medium-8 columns content">
    <h3><?= h($industry->id_indus) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categori Indus') ?></th>
            <td><?= h($industry->categori_indus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Indus') ?></th>
            <td><?= $this->Number->format($industry->id_indus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($industry->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($industry->modified) ?></td>
        </tr>
    </table>
</div>
