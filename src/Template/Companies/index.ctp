<?php
/**$this->extend('/Common/view');*/

/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
  */

use Cake\Core\Plugin;
use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Route\DashedRoute;
use mobiledetect\mobiledetectlib;

$detect = new Mobile_Detect;
$isMob = ($detect->isMobile() && !$detect->isTablet());

?>

<div class="uk-float-right uk-margin-small-bottom">
  <div class="uk-button-group">
    <div class="uk-inline">
          <button class="uk-button uk-button-primary bg-green uk-button-small uk-margin-small-top" type="button">Select Industry <i class="uk-margin-small-left" uk-icon="icon:  triangle-down"></i></button>
        <div uk-dropdown="mode: click">
          <?php
           $tab_indus= [];
           foreach ($industries as $industry) {
              array_push($tab_indus, $this->Html->link($industry->categori_indus, ['action' => 'category',$industry->id_indus]));
          } ?>
          <?= $this->Html->nestedList($tab_indus, ['tag'=>'ul', 'class'=>'uk-nav']); ?>
      </div>
    </div>
  </div>
  <?= $this->Html->link('Show all industries', ['action' => 'index'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top']); ?>
</div>
<div class="uk-clearfix"></div>


<div class="uk-margin-top">
  <h3 class="txt-orange uk-margin-small-bottom uk-text-center uk-text-left@s">Send speculative applications to Tier 2 sponsors by industry</h3>
  <div class="indusDesc txt-black uk-margin-medium-bottom uk-text-justify">
    <p>Sometimes the job you really want may not be advertised anywhere and speculative applications are often the appropriate way to secure such jobs.</p>
    <p>As a job seeker, it is always a challenge to decide which area you would like to work in, let alone find the best fit UK employers as an international student.</p>
    <p>Goodat Sponsors helps boost your work prospects by giving you access to thousands of sponsors’ emails so that you can send speculative applications to relevant companies.</p>
    <p>What you will need to do to gain from this approach is:</p>
    <ul class="list-items">
      <li>learn about the industry you are interested in</li>
      <li>prepare your cover letter and a CV</li> 
      <li>send as many applications as possible</li>
    </ul>
  </div>
</div>
<h3 class="txt-green uk-margin-small-bottom uk-text-center uk-text-left@s">List of sponsors by industry</h3>


<?php if($isMob): ?>

<div class="accordion-list-title txt-white bg-green">Companies</div>
<div class="uk-position-relative">
  <ul class="txt-black accordion-list" uk-accordion>
    <?php foreach ($companies as $company): ?>
      <li>
          <h3 class="uk-accordion-title"><?= h($company->name_company) ?></h3>
          <div class="uk-accordion-content">
            <ul class="uk-list uk-child-width-1-1 uk-grid-small" uk-grid>
              <?php if($isAdmin): ?>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                  <div>
                      <h5 class="txt-orange uk-margin-remove-bottom">Company Id</h5>
                      <p class="uk-margin-remove-top"><?= h($company->id_cmpny) ?></p>
                  </div>
                </li>
              <?php endif; ?>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Town/City</h5>
                        <p class="uk-margin-remove-top"><?= h($company->town_city) ?></p>
                    </div>
                </li>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Company's website</h5>
                        <p class="uk-margin-remove-top">
                            <a href="<?= 'http://'.str_replace(['http://', 'https://'],'', h($company->company_website)) ?>" target="_blank"><?= h($company->company_website) ?></a>
                        </p>
                    </div>
                </li>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Email</h5>
                        <p class="uk-margin-remove-top">
                            <a href="mailto:<?= h($company->email) ?>"><?= h($company->email) ?></a>
                        </p>
                    </div>
                </li>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Industry</h5>
                        <p class="uk-margin-remove-top">
                            <?= $company->has('industry') ? $company->industry->categori_indus : 'Nothing' ?>
                        </p>
                    </div>
                </li>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Sponsor</h5>
                        <p class="uk-margin-remove-top"><?= ($company->sponsor == 1) ? 'Yes':'No' ?></p>
                    </div>
                </li>
                <?php if($isAdmin): ?>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Created date</h5>
                        <p class="uk-margin-remove-top"><?= date_format($company->created, 'D d M Y à H:i:s') ?></p>
                    </div>
                </li>
                <li class="uk-margin-remove-top uk-margin-small-bottom">
                    <div>
                        <h5 class="txt-orange uk-margin-remove-bottom">Last modified date</h5>
                        <p class="uk-margin-remove-top"><?= date_format($company->modified, 'D d M Y à H:i:s') ?></p>
                    </div>
                </li>
                <li class="uk-margin-remove-top">
                  <div class="uk-margin-bottom">
                    <h5 class="txt-orange uk-margin-remove-bottom">Actions</h5>
                    <ul class="uk-padding-remove uk-list">
                      <li class="uk-display-inline-block uk-margin-small-right">
                        <?= $this->Html->link(__(''), ['action' => 'view', $company->id_cmpny], ['uk-icon'=>'icon: info']) ?>
                      </li>
                      <li class="uk-display-inline-block uk-margin-small-right">
                        <?= $this->Html->link(__(''), ['action' => 'edit', $company->id_cmpny], ['uk-icon'=>'icon: file-edit']) ?>
                      </li>
                      <li class="uk-display-inline-block">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $company->id_cmpny], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id_cmpny), 'uk-icon'=>'icon: trash']) ?>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php endif; ?>
            </ul>
          </div>
      </li>
    <?php endforeach; ?>
  </ul>

/*  
<?php if(!$isSubcriber && !$isAdmin): ?>
  <div class="section-blur mob"></div>
  <?php endif; ?>

</div>
*/
/*
<?php if(!$isSubcriber && !$isAdmin): ?>
 <?php if(false) { ?> <div class="callto-subscribe uk-text-center">
    <h4 class="txt-orange uk-margin-small-top uk-margin-small-bottom">Upgrade to have full access to our ‘work prospects boost’ package.</h4>
    <?= $this->Html->link('go to subscribe', ['controller'=>'Users', 'action' => 'subscribe'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top uk-margin-bottom']); ?>
  </div><?php } ?>
<?php endif; ?>
*/

<?php else : ?>

<div class="uk-overflow-auto uk-position-relative">
  <table class="uk-table uk-table-middle uk-table-small uk-table-hover uk-table-striped">
    <thead>
        <tr>
          <th>Company</th>
          <th>Website</th>
          <th>Where to apply</th>
          <th>Location</th>
          <th>Industry</th>
          <th>Sponsor</th>
          <?php if ($isAdmin):?>
            <th class="uk-width-small">Actions</th>
          <?php endif; ?>
    </thead>
    <tbody>
        <?php foreach ($companies as $company): ?>
        <tr>
            <td><?= h($company->name_company) ?></td>
            <td><a href="<?= 'http://'.str_replace(['http://', 'https://'],'', h($company->company_website)) ?>" target="_blank"><?= h($company->company_website) ?></a> </td>
            <td><a href="mailto:<?= h($company->email) ?>"><?= h($company->email) ?></a></td>
            <td><?= h($company->town_city) ?></td>
            <td class="uk-table-link"><?= $company->has('industry') ? $this->Html->link($company->industry->categori_indus, ['controller' => 'Companies', 'action' => 'category', $company->industry->id_indus]) : '' ?></td>
            <td class="uk-text-center"><?= $company->sponsor ? __('Yes') : __('No'); ?></td>
            <?php if ($isAdmin): ?>
              <td>
                <ul class="uk-padding-remove uk-list">
                  <li class="uk-display-inline-block uk-margin-small-right">
                    <?= $this->Html->link(__(''), ['action' => 'view', $company->id_cmpny], ['uk-icon'=>'icon: info']) ?>
                  </li>
                  <li class="uk-display-inline-block uk-margin-small-right">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $company->id_cmpny], ['uk-icon'=>'icon: file-edit']) ?>
                  </li>
                  <li class="uk-display-inline-block">
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $company->id_cmpny], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id_cmpny), 'uk-icon'=>'icon: trash']) ?>
                  </li>
                </ul>
              </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
/*
  <?php if(!$isSubcriber && !$isAdmin): ?>
  <div class="section-blur"></div>
  <?php endif; ?>

</div>
*/
<?php if(!$isSubcriber && !$isAdmin): ?>
 <?php if(false) { ?> <div class="callto-subscribe uk-text-center">
    <h4 class="txt-orange uk-margin-small-top uk-margin-small-bottom">Upgrade to have full access to our ‘work prospects boost’ package.</h4>
    <?= $this->Html->link('go to subscribe', ['controller'=>'Users', 'action' => 'subscribe'], ['class'=>'uk-button uk-button-primary bg-orange uk-button-small uk-margin-small-top uk-margin-bottom']); ?>
  </div><?php } ?>
<?php endif; ?>


<?php endif; ?>

<?php if($isAdmin || $isSubcriber ||!$isSubcriber): ?>
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

