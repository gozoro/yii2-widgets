<?php

use gozoro\yii2\helpers\Html;


?>

<div class="input-daterange input-group" id="datepicker">
	<?=Html::textInput($attributesBegin['name'], $attributesBegin['value'], $attributesBegin)?>
	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	<?=Html::textInput($attributesEnd['name'], $attributesEnd['value'], $attributesEnd)?>
</div>
<script>
	$(document).ready(function()
	{
		$("#<?=$attributesBegin['id']?>").parent().datepicker(<?=$jsOptions?>);
	});
</script>