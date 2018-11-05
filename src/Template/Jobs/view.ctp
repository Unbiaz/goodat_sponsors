<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Job $job
  */
?>
<div class="job-item uk-padding-small txt-black uk-margin-top">
    <div class="header uk-position-relative">
        <?php if($job->shortage): ?>
            <span class="uk-badge bg-orange uk-display-inline-block uk-position-top-right">Skill shortage</span>
        <?php endif; ?>
        <h1 class="uk-article-title txt-green uk-margin-large-top"><?= h($job->title) ?></h1>
        <p class="uk-margin-remove">
            <span class="uk-text-bold"><?= h($job->company['name_company']) ?></span> - <span><?= h($job->functional_area['name']) ?></span> - <span><?= h($job->location['name']) ?></span>
        </p>
        <p class="uk-margin-remove"><b class="txt-green">Job Type :</b> <?= h($job->contrat_type['name']) ?></p>
        <? if($isAdmin) : ?>
            <p class="uk-margin-remove"><b class="txt-green">Created date :</b> <?= date_format($job->contrat_type['created'], 'D d M Y à H:i:s') ?></p>
            <p class="uk-margin-remove"><b class="txt-green">Last modified date :</b> <?= date_format($job->contrat_type['modified'], 'D d M Y à H:i:s') ?></p>
        <? endif; ?>
    </div>
    <hr>
    <div class="body">
        <h4 class="txt-green uk-margin-remove-bottom">Details</h4>
        <div class="indusDesc uk-text-justify"><?= $job->description ?></div>
    </div>
    <hr>
    <div class="footer uk-position-relative">
        <a href="<?= h($job->link) ?>" target="_blank" class="uk-button uk-button-primary bg-orange uk-button-small">Apply now</a>
        <span class="txt-orange uk-display-inline-block uk-position-center-right">Deadline : <?= date_format($job->expirated, 'd M Y') ?></span>
    </div>
</div>