<?php if ($isLoggedIn): ?>

<?php $controller = $this->request->params['controller']; 
      $action = $this->request->params['action']; ?>

<nav class="uk-navbar-container bg-white uk-margin-small-top" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav uk-grid-collapse uk-child-width-1-3 uk-child-width-auto@s uk-grid-match" uk-grid>
            <li class="<?= ($controller=='Companies' && in_array($action,['index', 'category'])) ? 'uk-active':'' ?>">
                <?= $this->Html->link(__('Industry 4.0 firms'), ['controller'=>'Companies', 'action'=>'index']) ?>
            </li>
            <li class="<?= ($controller=='Jobs' && in_array($action,['index', 'location', 'area'])) ? 'uk-active':'' ?>">
                <?= $this->Html->link(__('Sponsored jobs'), ['controller'=>'Jobs', 'action'=>'index']) ?>
            </li>
            <li class="<?= ($this->request->params['controller']=='Jobs' && $this->request->params['action']=='talentRoute') ? 'uk-active':'' ?>">
                <?= $this->Html->link(__('Advisory services'), ['controller'=>'Jobs', 'action'=>'talentRoute']) ?>
            </li>
        </ul>
    </div>
</nav>

<?php endif; ?>

