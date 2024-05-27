<?php

use gozoro\yii2\helpers\Html;

$id    = $attributes['id'];
$name  = $attributes['name'];
$value = $attributes['value'];
?>








<?=Html::input('text', $name, $value, $attributes)?>

<script>
	$(document).ready(function()
	{
		$('#<?=$id?>').autocompleter(<?=$jsVariants?>, <?=$jsOptions?> );
	});
</script>