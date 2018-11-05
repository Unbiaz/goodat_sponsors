<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
  */

use Cake\Routing\Router;
use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<div class="uk-float-right uk-margin-bottom">
  <div class="uk-button-group">
    <div class="uk-inline">
          <button class="uk-button uk-button-primary bg-green uk-button-small uk-margin-small-top" type="button">Select functional area <i class="uk-margin-small-left" uk-icon="icon:  triangle-down"></i></button>
        <div class="uk-width-1-1" uk-dropdown="mode: click">
            <ul class="uk-nav">
                <?php foreach($functionalAreas as $key => $functionalArea): ?>
                    <li><?= $this->Html->link( h($functionalArea), ['action'=>'area', $key]) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
  </div>
  <div class="uk-button-group">
    <div class="uk-inline">
          <button class="uk-button uk-button-primary bg-green uk-button-small uk-margin-small-top" type="button">Select location <i class="uk-margin-small-left" uk-icon="icon:  triangle-down"></i></button>
        <div uk-dropdown="mode: click">
            <ul class="uk-nav">
                <?php foreach($locations as $key => $locations): ?>
                    <li><?= $this->Html->link( h($locations), ['action'=>'location', $key]) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
  </div>
  <?= $this->Html->link(__('Show all hot jobs'), ['action' => 'index'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top']); ?>
</div>
<div class="uk-clearfix"></div>

<h3 class="txt-green uk-margin-small-bottom uk-margin-small-top uk-text-center uk-text-left@s">Hot jobs</h3>

<?php if(!$isAdmin): ?>

<div class="uk-position-relative">
    <ul class="txt-black uk-grid-small uk-child-width-1-2@s uk-grid-match" uk-grid uk-height-match=".body">
        <?php foreach($jobs as $job): ?>
            <li>
                <div class="job-item uk-padding-small bg-white">
                    <div class="header uk-position-relative">
                        <?php if($job->shortage): ?>
                            <span class="uk-badge bg-orange uk-display-inline-block uk-position-top-right">Skill shortage</span>
                        <?php endif; ?>
                        <h3 class="txt-green uk-margin-remove"><?= $this->Html->link(__(h($job->title)), ['action'=>'view', $job->id])  ?></h3>
                        <p class="uk-margin-remove">
                            <span class="uk-text-bold"><?= h($job->company['name_company']) ?></span> - <span><?= h($job->functional_area['name']) ?></span> - <span><?= h($job->location['name']) ?></span>
                        </p>
                        <p class="uk-margin-remove"><b class="txt-green">Job type :</b> <?= h($job->contrat_type['name']) ?></p>
                    </div>
                    <hr>
                    <div class="body">
                        <h4 class="txt-green uk-margin-remove-bottom">Details</h4>
                        <div class="uk-text-justify"><?= $this->Text->truncate(h($job->description), 325, ['ellipsis'=>'... '.$this->Html->link(__('Read more'), ['action'=>'view', $job->id])]); ?></div>
                    </div>
                    <hr>
                    <div class="footer uk-position-relative">
                        <a href="<?= h($job->link) ?>" target="_blank" class="uk-button uk-button-primary bg-orange uk-button-small">Apply now</a>
                        <span class="txt-orange uk-display-inline-block uk-position-center-right">Deadline : <?= date_format($job->expirated, 'd M Y') ?></span>
                    </div>
                </div>
            </li>    
        <?php endforeach; ?>
    </ul>

 /*    <?php if(!$isSubcriber): ?>
        <div class="section-blur" style="bottom:0;"></div>
    <?php endif; ?>

</div>
*/
/*
    <?php if(!$isSubcriber): ?>
      <?php if(false) { ?><div class="callto-subscribe uk-text-center">
        <h4 class="txt-orange uk-margin-small-top uk-margin-small-bottom">Upgrade to have full access to our ‘work prospects boost’ package.</h4>
        <?= $this->Html->link('go to subscribe', ['controller'=>'Users', 'action' => 'subscribe'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top uk-margin-bottom']); ?>
      </div><?php } ?>
    <?php endif; ?>
*/
<?php else : ?>

    <?php if($isMob): ?>

    <div class="accordion-list-title txt-white bg-green">Jobs</div>
    <div class="uk-position-relative">
      <ul class="txt-black accordion-list" uk-accordion>
        <?php foreach ($jobs as $job): ?>
          <li>
              <h3 class="uk-accordion-title"><?= h($job->title) ?></h3>
              <div class="uk-accordion-content">
                <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
                  <?php if($isAdmin): ?>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                      <div>
                          <h5 class="txt-orange uk-margin-remove-bottom">Company</h5>
                          <p class="uk-margin-remove-top"><?= h($job->company['name_company']) ?></p>
                      </div>
                    </li>
                  <?php endif; ?>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Functional area</h5>
                            <p class="uk-margin-remove-top"><?= h($job->functional_area['name']) ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Location</h5>
                            <p class="uk-margin-remove-top"><?= h($job->location['name']) ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Job type</h5>
                            <p class="uk-margin-remove-top"><?= h($job->contrat_type['name']) ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Deadline</h5>
                            <p class="uk-margin-remove-top"><?= date_format($job->expirated, 'd M Y') ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Apply now</h5>
                            <a href="<?= h($job->link) ?>" target="_blank">Click to apply</a>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Skill shortage</h5>
                            <p class="uk-margin-remove-top"><?= ($job->shortage)? __('Yes'):__('No') ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                            <p class="uk-margin-remove-top"><?= date_format($job->created, 'D d M Y à H:i:s') ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top uk-margin-small-bottom">
                        <div>
                            <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                            <p class="uk-margin-remove-top"><?= date_format($job->modified, 'D d M Y à H:i:s') ?></p>
                        </div>
                    </li>
                    <li class="uk-margin-remove-top">
                      <div class="uk-margin-bottom">
                        <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                        <ul class="uk-padding-remove uk-list">
                          <li class="uk-display-inline-block uk-margin-small-right">
                            <?= $this->Html->link(__(''), ['action' => 'view', $job->id], ['uk-icon'=>'icon: info']) ?>
                          </li>
                          <li class="uk-display-inline-block uk-margin-small-right">
                            <?= $this->Html->link(__(''), ['action' => 'edit', $job->id], ['uk-icon'=>'icon: file-edit']) ?>
                          </li>
                          <li class="uk-display-inline-block">
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->title), 'uk-icon'=>'icon: trash']) ?>
                          </li>
                        </ul>
                      </div>
                    </li>
                </ul>
              </div>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>

    <?php else : ?>

    <div class="uk-overflow-auto uk-position-relative">
      <table class="uk-table uk-table-small uk-table-hover uk-table-striped">
        <thead>
            <tr>
              <th><?= __('ID') ?></th>
              <th><?= __('Title') ?></th>
              <th><?= __('Company') ?></th>
              <th><?= __('Area') ?></th>
              <th><?= __('Location') ?></th>
              <th><?= __('Job type') ?></th>
              <th><?= __('Deadline') ?></th>
              <th><?= __('Skill shortage') ?></th>
              <th><?= __('Apply now') ?></th>
              <th class="uk-width-small">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= h($job->id) ?></td>
                <td><?= h($job->title) ?></td>
                <td><a href="<?= Router::url(['controller'=>'Companies', 'action'=>'view', $job->company['id_cmpny']], true) ?>"><?= h($job->company['name_company']) ?></a></td>
                <td><?= h($job->functional_area['name']) ?></td>
                <td><?= h($job->location['name']) ?></td>
                <td><?= h($job->contrat_type['name']) ?></td>
                <td><?= date_format($job->expirated, 'd/m/Y') ?></td>
                <td><?= ($job->shortage)? __('Yes'):__('No') ?></td>
                <td><a href="<?= h($job->link) ?>" target="_blank">Click to apply</a></td>
                <td>
                    <ul class="uk-padding-remove uk-list">
                      <li class="uk-display-inline-block uk-margin-small-right">
                        <?= $this->Html->link(__(''), ['action' => 'view', $job->id], ['uk-icon'=>'icon: info']) ?>
                      </li>
                      <li class="uk-display-inline-block uk-margin-small-right">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $job->id], ['uk-icon'=>'icon: file-edit']) ?>
                      </li>
                      <li class="uk-display-inline-block">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->title), 'uk-icon'=>'icon: trash']) ?>
                      </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>

    </div>

    <?php endif; ?>

<?php endif; ?>

<?php if($isAdmin || $isSubcriber||!$isSubcriber): ?>
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
<?php endif; ?>
