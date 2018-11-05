<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Company $company
  */

$this->start('title');
echo h($company->name_company);
$this->end();

?>

<div class="uk-article txt-black">
    <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($company->name_company) ?></h1>
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-2@s uk-grid-medium" uk-grid>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Company Id</h4>
                    <p class="uk-margin-small-top"><?= h($company->id_cmpny) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Town/City</h4>
                    <p class="uk-margin-small-top"><?= h($company->town_city) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Company's website</h4>
                    <p class="uk-margin-small-top"><?= h($company->company_website) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Email</h4>
                    <p class="uk-margin-small-top"><?= h($company->email) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Industry</h4>
                    <p class="uk-margin-small-top">
                        <?= $company->has('industry') ? $this->Html->link($company->industry->categori_indus, ['controller' => 'Companies', 'action' => 'category', $company->industry->id_indus]) : 'Nothing' ?>
                    </p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Sponsor</h4>
                    <p class="uk-margin-small-top"><?= ($company->sponsor == 1) ? 'Yes':'No' ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($company->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($company->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>