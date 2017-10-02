<?php
	if ($boolValue) {
		echo '<span class="glyphicon glyphicon-ok"></span>';
	} else if (isset($tickonly)) {
		//echo "nbsp;";
	} else {
		echo '<span class="glyphicon glyphicon-remove"></span>';
	}
?>