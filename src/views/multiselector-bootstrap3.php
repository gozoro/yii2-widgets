<?php

use gozoro\yii2\helpers\Html;

$id = $attributes['id'];


?>
<select <?=Html::renderTagAttributes($attributes)?>>
<?foreach($items as $key => $item):?>

<?
	$selected = '';
	if(in_array($key, $selection)) $selected = 'selected';
?>


	<option value="<?=Html::encode($key)?>" <?=$selected?>><?=Html::encode($item)?></option>
<?endforeach?>
</select>

<script>

$(document).ready(function()
{

	$('#<?=$id?>').multiselect(<?=$jsOptions?>);


});

</script>