<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Industry[]|\Cake\Collection\CollectionInterface $industries
  */

use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">List of industries</h4>

<?php if($isMob): ?>
<div class="accordion-list-title txt-white bg-green">Industries</div>
<ul class="txt-black accordion-list" uk-accordion>
  <?php foreach ($industries as $industry): ?>
    <li>
        <h3 class="uk-accordion-title"><?= h($industry->categori_indus) ?></h3>
        <div class="uk-accordion-content">
          <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Industry Id</h5>
                    <p class="uk-margin-remove-top"><?= h($industry->id_indus) ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($industry->created, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($industry->modified, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Description</h5>
                    <div class="indusDesc uk-margin-bottom uk-text-justify"><?= $industry->desc_indus ?></div>
                </div>
              </li>
              <li class="uk-margin-remove-top">
                <div class="uk-margin-bottom">
                  <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $industry->id_indus], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $industry->id_indus], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $industry->id_indus], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id_indus), 'uk-icon'=>'icon: trash']) ?>
                    </li>
                  </ul>
                </div>
              </li>
          </ul>
        </div>
    </li>
  <?php endforeach; ?>
</ul>

<?php else : ?>

<div class="uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-hover uk-table-striped">
        <thead>
            <tr>
                <th class="uk-width-small">N° industry</th>
                <th>Category of industry</th>
                <th>Description</th>
                <th class="uk-width-small">Actions</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($industries as $industry): ?>
            <tr>
                <td><?= $this->Number->format($industry->id_indus) ?></td>
                <td><?= h($industry->categori_indus) ?></td>
                <td><div class="indusDesc"><?= $industry->desc_indus ?></div></td>
                <td>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $industry->id_indus], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $industry->id_indus], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $industry->id_indus], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id_indus), 'uk-icon'=>'icon: trash']) ?>
                    </li>
                  </ul>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>

<div class="pagination">
    <ul class="uk-pagination uk-flex-center uk-margin-top uk-padding-small">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p class="uk-text-center txt-black"> <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?> </p>
</div>