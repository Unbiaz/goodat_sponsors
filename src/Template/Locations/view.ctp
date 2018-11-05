<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Location $location
  */
?>

<div class="uk-article txt-black">
    <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($location->name) ?></h1>
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-3@s uk-grid-medium" uk-grid>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Location Id</h4>
                    <p class="uk-margin-small-top"><?= $this->Number->format($location->id) ?></p>
                </div>
            </li>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Location</h4>
                    <p class="uk-margin-small-top"><?= h($location->name) ?></p>
                </div>
            </li>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($location->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($location->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- <div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>

    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($location->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Shortage') ?></th>
                <th scope="col"><?= __('Cmpny Id') ?></th>
                <th scope="col"><?= __('Contrat Id') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Expirated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->id) ?></td>
                <td><?= h($jobs->title) ?></td>
                <td><?= h($jobs->description) ?></td>
                <td><?= h($jobs->link) ?></td>
                <td><?= h($jobs->shortage) ?></td>
                <td><?= h($jobs->cmpny_id) ?></td>
                <td><?= h($jobs->contrat_id) ?></td>
                <td><?= h($jobs->area_id) ?></td>
                <td><?= h($jobs->location_id) ?></td>
                <td><?= h($jobs->created) ?></td>
                <td><?= h($jobs->modified) ?></td>
                <td><?= h($jobs->expirated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div> -->
