<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */

use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<h4 class="uk-margin-small-bottom uk-margin-large-top txt-green">List of users</h4>

<?php if($isMob): ?>

<div class="accordion-list-title txt-white bg-green">Users</div>
<ul class="txt-black accordion-list" uk-accordion>
  <?php foreach ($users as $user): ?>
    <li>
        <h3 class="uk-accordion-title"><?= h($user->username) ?></h3>
        <div class="uk-accordion-content">
          <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">User Id</h5>
                    <p class="uk-margin-remove-top"><?= h($user->id_user) ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h5 class="txt-orange uk-margin-remove-bottom">User email</h5>
                    <p class="uk-margin-remove-top"><?= $user->email ?></p>
                </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($user->created, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                      <p class="uk-margin-remove-top"><?= date_format($user->modified, 'D d M Y à H:i:s') ?></p>
                  </div>
              </li>
              <li class="uk-margin-remove-top">
                <div class="uk-margin-bottom">
                  <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $user->id_user], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $user->id_user], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id_user], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id_user), 'uk-icon'=>'icon: trash']) ?>
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
                <th>ID</th>
                <th>username</th>
                <th>email</th>
                <th>created date</th>
                <th>last modified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id_user) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= date_format($user->created, 'D d M Y à H:i:s') ?></td>
                <td><?= date_format($user->modified, 'D d M Y à H:i:s') ?></td>
                <td>
                  <ul class="uk-padding-remove uk-list">
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'view', $user->id_user], ['uk-icon'=>'icon: info']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Html->link(__(''), ['action' => 'edit', $user->id_user], ['uk-icon'=>'icon: file-edit']) ?>
                    </li>
                    <li class="uk-display-inline-block uk-margin-small-right">
                      <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id_user], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id_user), 'uk-icon'=>'icon: trash']) ?>
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
