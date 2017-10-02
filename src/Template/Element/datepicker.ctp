<?php

// $field - the name of the field
// $value - the actual field
// $title

?>

<label class="col-sm-2 control-label" for="<?= $field ?>"><?= $title ?></label>

<div class='col-sm-4'>
	<div class="form-group">
		<div class='input-group date' id='dp_<?= $field ?>'>
			<input type='text' class="form-control" name='<?= $field ?>' id='<?= strtolower($field) ?>'
			value="<?= !empty($value) ? $value->format('Y-m-d') : '' ?>"
			/>
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		$('#dp_<?= $field ?>').datetimepicker({
			format: 'YYYY-MM-DD',
		});
	});
</script>
