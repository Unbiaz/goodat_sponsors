<?php

// Parameters:
//
// Required:
// $theID - numeric id of the item that the actions refer to.
//
// Optional:
// $controller - Name of controller for actions
// $editCondition - Boolean state that determines if edit action is displayed
// $deleteCondition -  Boolean state that determines if delete action is displayed
// $inlinePosts - Boolean state that determines whether postLink forms are shown inline
//

	$viewIcon = '<span class="glyphicon glyphicon-search"></span> ';
	$editIcon = '<span class="glyphicon glyphicon-edit"></span> ';
	$deleteIcon = '<span class="glyphicon glyphicon-remove"></span> ';

	$class = null;
	//$showAsButtons = true;

	if (!isset($controller)) {
		$controller = strtolower($this->name);
	}

	if (!isset($viewCondition)) {
		$viewCondition = true;
	}

	if (!isset($editCondition)) {
		$editCondition = true;
	}

	if (!isset($deleteCondition)) {
		$deleteCondition = (AuthComponent::user('role') == 'admin');
	}

	if (!isset($deleteString)) {
		$deleteString = "# $theID";
	}

	if (!isset($inlinePosts)) {
		$inlinePosts = true;
	}

	if (!$this->request->is('ajax')) {

		if (isset($showAsButtons)) {
			$class = 'btn';
			echo "<div class='btn-group' role='group'>";
		}

		if ($editCondition) {
			echo $this->Html->link($viewIcon, array('controller' => $controller, 'action' => 'view', $theID), array('class' => $class, 'data-toggle' => 'modal', 'data-target' => '#myModal', 'escape' => FALSE));
		}

		if ($editCondition) {
			echo $this->Html->link($editIcon, array('controller' => $controller, 'action' => 'edit', $theID), array('class' => $class, 'data-toggle' => 'modal', 'data-target' => '#myModal', 'escape' => FALSE));
		}

		if ($deleteCondition) {
			//echo $this->Form->postLink($deleteIcon, array('controller' => $controller, 'action' => 'delete', $theID), array('class' => $class, 'escape' => FALSE, 'inline' => $inlinePosts), __('Are you sure you want to delete %s?', $deleteString));
			// cake 2.8
			echo $this->Form->postLink($deleteIcon, array('controller' => $controller, 'action' => 'delete', $theID), array('class' => $class, 'escape' => FALSE, 'inline' => $inlinePosts, 'confirm' => __('Are you sure you want to delete %s?', $deleteString))); 
		}

		if (isset($showAsButtons)) {
			echo "</div>";
		}

	}

?>
