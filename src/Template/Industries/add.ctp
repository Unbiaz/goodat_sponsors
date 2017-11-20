<?php
/**
  * @var \App\View\AppView $this
  */
?>

<style>

  a{
      color: #4169E1;
  }
  
</style>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Industries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="industries form large-9 medium-8 columns content">
    <?= $this->Form->create($industry) ?>
    <fieldset>
        <legend><?= __('Add Industry') ?></legend>
        <?php
            echo $this->Form->control('categori_indus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
