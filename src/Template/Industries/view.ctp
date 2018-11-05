<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Industry $industry
  */

$this->start('title');
echo h($industry->categori_indus);
$this->end();

?>

<div class="uk-article txt-black">
    <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($industry->categori_indus) ?></h1>
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-3@s uk-grid-medium" uk-grid>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Industry Id</h4>
                    <p class="uk-margin-small-top"><?= h($industry->id_indus) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($industry->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($industry->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
    <div class="desc txt-black">
        <h4 class="txt-green uk-margin-small-bottom">Description</h4>
        <div class="indusDesc"><?= $industry->desc_indus ?></div>
    </div>
</div>
