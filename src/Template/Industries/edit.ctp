<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $industry->id_indus],
                ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id_indus)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Industries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="industries form large-9 medium-8 columns content">
    <?= $this->Form->create($industry) ?>
    <fieldset>
        <legend><?= __('Edit Industry') ?></legend>
        <?php
            echo $this->Form->control('categori_indus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
