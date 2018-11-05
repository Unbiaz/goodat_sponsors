<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>

<div class="uk-article txt-black">
    <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($user->username) ?></h1>
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-2@s uk-grid-medium" uk-grid>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">User Id</h4>
                    <p class="uk-margin-small-top"><?= h($user->id_user) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">User email</h4>
                    <p class="uk-margin-small-top"><?= h($user->email) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($user->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($user->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>
