
<?php if ($isAdmin): ?>
<div class="uk-padding-smaller uk-display-inline-block">

	<div class="uk-button-group">
		<div class="uk-inline">
	        <button class="uk-button uk-button-primary bg-green uk-button-small" type="button">Admin <i class="uk-margin-small-left" uk-icon="icon:  triangle-down"></i></button>
	    	<div class="uk-padding-small" uk-dropdown="mode: click">
	    		<ul class="uk-nav uk-nav-parent-icon" uk-nav>
					<li class="uk-parent">
						<a>Companies</a>
						<ul class="uk-sub-nav">
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
						</ul>
					</li>
					<li class="uk-parent">
						<a>Industries</a>
						<ul class="uk-sub-nav">
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Industry'), ['controller' => 'Industries', 'action' => 'add']) ?></li>
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List Industries'), ['controller' => 'Industries', 'action' => 'index']) ?></li>
						</ul>
					</li>
                    <li class="uk-parent">
						<a>Jobs</a>
						<ul>
                            <li>
                                <a>Hot Jobs</a>
                                <ul class="uk-sub-nav">
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List of jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
                                </ul>
                            </li>
                            <li>
                                <a>Contrat types</a>
                                <ul class="uk-sub-nav">
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Contrat type'), ['controller' => 'ContratTypes', 'action' => 'add']) ?></li>
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List contrat types'), ['controller' => 'ContratTypes', 'action' => 'index']) ?></li>
                                </ul>
                            </li>
                            <li>
                                <a>Functional areas</a>
                                <ul class="uk-sub-nav">
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Function area'), ['controller' => 'FunctionalAreas', 'action' => 'add']) ?></li>
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List of areas'), ['controller' => 'FunctionalAreas', 'action' => 'index']) ?></li>
                                </ul>
                            </li>
                            <li>
                                <a>Locations</a>
                                <ul class="uk-sub-nav">
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
                                    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List of locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
                                </ul>
                            </li>
						</ul>
					</li>
					<li class="uk-parent">
						<a>Payments</a>
						<ul class="uk-sub-nav">
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
						</ul>
					</li>
					<li class="uk-parent">
						<a>Users</a>
						<ul class="uk-sub-nav">
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
						    <li><i class="uk-margin-small-right uk-float-left" uk-icon="icon:chevron-right"></i><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
						</ul>
					</li>
	    		</ul>
	    	</div>
		</div>
	</div>

</div>
				
<?php endif; ?>


<?php if ($isLoggedIn): ?>

<div class="uk-padding-smaller uk-display-inline-block">

	<div class="uk-button-group">
		<div class="uk-inline">
	        <button class="uk-button uk-button-primary bg-orange uk-button-small" type="button"><?= $username ?> <i class="uk-margin-small-left" uk-icon="icon:  triangle-down"></i></button>
	    	<div uk-dropdown="mode: click">
	    		<ul class="uk-nav">
                    <li><?= $this->Html->link(__('Companies'), ['controller'=>'Companies', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Hot Jobs'), ['controller'=>'Jobs', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Edit profile'), ['controller'=>'Users', 'action' => 'edit', $user_id]) ?></li>
                    <li class="uk-parent">
                        <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'uk-display-inline-block']); ?>
                        <i class="uk-display-inline-block" uk-icon="icon: sign-out"></i>
                    </li>
				</ul>
			</div>
		</div>
	</div>

</div>

<?php endif; ?>

