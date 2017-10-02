<?php
	$site = $link;
	if (strlen($site)>3) {
		if (strpos($site, 'http') !== FALSE) {
			//echo 'Found it';
		} else {
			$site = 'http://' . $site;
		}

		echo $this->Html->link($site, $this->Html->url($site), array('target' => '_blank', 'escape' => false)); 
	}
?>
