<?php

use gozoro\yii2\helpers\Html;



$id    = $attributes['id'];
$name  = $attributes['name'];
$value = $attributes['value'];


?>

<div class="input-group date">
	<?=Html::textInput($name, $value, $attributes)?>
	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>

<script>
	$(document).ready(function()
	{
		$('#<?=$id?>').parent().datepicker(<?=$jsOptions?>);
	});
</script>