<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ContratType[]|\Cake\Collection\CollectionInterface $contratTypes
  */

use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>
<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">List of contrat types</h4>

<?php if($isMob): ?>
<div class="accordion-list-title txt-white bg-green">Contrat types</div>
<ul class="txt-black accordion-list" uk-accordion>
  <?php foreach ($contratTypes as $contratType): ?>
    <li>
        <h3 class="uk-accordion-title"><?= h($contratType->name) ?></h3>
        <div class="uk-accordion-content">
          <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Contrat type Id</h5>
                    <p class="uk-margin-remove-top"><?= h($contratType->id) ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($contratType->created, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($contratType->modified, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top">
                <div class="uk-margin-bottom">
                  <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $contratType->id], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $contratType->id], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $contratType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratType->id), 'uk-icon'=>'icon: trash']) ?>
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
                <th class="uk-width-small">N° contrat type</th>
                <th>Contrat type</th>
                <th class="uk-width-small">Actions</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratTypes as $contratType): ?>
            <tr>
                <td><?= $this->Number->format($contratType->id) ?></td>
                <td><?= h($contratType->name) ?></td>
                <td>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $contratType->id], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $contratType->id], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $contratType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratType->id), 'uk-icon'=>'icon: trash']) ?>
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

