<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Payment[]|\Cake\Collection\CollectionInterface $payments
  */

use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">List of payments</h4>

<?php if($isMob): ?>

<div class="accordion-list-title txt-white bg-green">Payments</div>
<ul class="txt-black accordion-list" uk-accordion>
  <?php foreach ($payments as $payment): ?>
    <li>
        <h3 class="uk-accordion-title">Payment <?= h($payment->id_pay) ?></h3>
        <div class="uk-accordion-content">
          <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Payment Id</h5>
                    <p class="uk-margin-remove-top"><?= h($payment->id_pay) ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Username</h5>
                    <p class="uk-margin-remove-top"><?= $payment->has('user') ? $payment->user->username : 'Nothing' ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">Payment Amount</h5>
                    <p class="uk-margin-remove-top"><?= '£'.h($payment->amount) ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Valid to</h5>
                      <p class="uk-margin-remove-top"><?= date_format($payment->validTo, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($payment->created, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($payment->modified, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top">
                <div class="uk-margin-bottom">
                  <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $payment->id_pay], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $payment->id_pay], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $payment->id_pay], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id_pay), 'uk-icon'=>'icon: trash']) ?>
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

    <table class="uk-table uk-table-middle uk-table-small uk-table-hover uk-table-striped">
        <thead>
            <tr>
                <th class="uk-width-small">N° pay</th>
                <th class="uk-width-small">Amount</th>
                <th>Created</th>
                <th>Valid To</th>
                <th>User name</th>
                <th class="uk-width-small">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= $this->Number->format($payment->id_pay) ?></td>
                <td><?= $this->Number->format($payment->amount).' USD' ?></td>
                <td><?= date_format($payment->created, 'D d M Y à H:i:s') ?></td>
                <td><?= date_format($payment->validTo, 'D d M Y à H:i:s') ?></td>
                <td class="uk-table-link"><?= $payment->has('user') ? $this->Html->link($payment->user->username, ['controller' => 'Users', 'action' => 'view', $payment->user->id_user]) : '' ?></td>
                <td class="actions">
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $payment->id_pay], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $payment->id_pay], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $payment->id_pay], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id_pay), 'uk-icon'=>'icon: trash']) ?>
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

    <p class="uk-text-center txt-black"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

</div>
