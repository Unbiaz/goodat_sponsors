<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FunctionalArea $functionalArea
  */
$this->start('title');
echo h($functionalArea->name);
$this->end();

?>

<div class="uk-article txt-black">
    <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($functionalArea->name) ?></h1>
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-3@s uk-grid-medium" uk-grid>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Functional area Id</h4>
                    <p class="uk-margin-small-top"><?= $this->Number->format($functionalArea->id) ?></p>
                </div>
            </li>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Functional area</h4>
                    <p class="uk-margin-small-top"><?= h($functionalArea->name) ?></p>
                </div>
            </li>

            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($functionalArea->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($functionalArea->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>
