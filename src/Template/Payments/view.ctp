<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Payment $payment
  */
?>

<div class="uk-article txt-black uk-margin-large-top">
    <div class="details">
        <ul class="uk-list uk-list-divider-bottom uk-child-width-1-2@s uk-grid-medium" uk-grid>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Payment Id</h4>
                    <p class="uk-margin-small-top"><?= h($payment->id_pay) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Username</h4>
                    <p class="uk-margin-small-top">
                        <?= $payment->has('user') ? $this->Html->link($payment->user->username, ['controller' => 'Users', 'action' => 'view', $payment->user->id_user]) : 'Nothing' ?>
                    </p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Payment Amount</h4>
                    <p class="uk-margin-small-top"><?= '£'.h($payment->amount) ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Valid to</h4>
                    <p class="uk-margin-small-top"><?= date_format($payment->validTo, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Created date</h4>
                    <p class="uk-margin-small-top"><?= date_format($payment->created, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
            <li class="uk-margin-remove-top uk-margin-small-bottom">
                <div>
                    <h4 class="txt-green uk-margin-small-bottom">Last modified date</h4>
                    <p class="uk-margin-small-top"><?= date_format($payment->modified, 'D d M Y à H:i:s') ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>
