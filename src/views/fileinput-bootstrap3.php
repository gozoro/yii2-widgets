<?php

use gozoro\toolbox\helpers\Html;


$name  = $inputAttributes['name'];
$value = $inputAttributes['value'];

$inputId    = $inputAttributes['id'];
$buttonId   = $buttonAttributes['id'];
$fileareaId = $fileareaAttributes['id'];
$buttonClass = $buttonAttributes['class']

?>

<div>
	<?=Html::fileInput($name, $value, $inputAttributes)?>
	<button <?=Html::renderTagAttributes($buttonAttributes)?>><?=$content?></button>
	<filearea <?=Html::renderTagAttributes($fileareaAttributes)?>></filearea>
</div>
<script>
	$(document).ready(function()
	{
		$("#<?=$inputId?>").change(function()
		{
			$("#<?=$buttonId?>").change();
		});

		$("#<?=$buttonId?>").click(function()
		{
			$("#<?=$inputId?>").click();
		})
		.change(function()
		{
			var files = $("#<?=$inputId?>").get(0).files;
			var countFiles = files ? files.length : 1;
			var fileNames = [], i;

			for(i=0; i<countFiles; i++)
			{
				fileNames.push( files[i].name );
			}

			var $btn = $(this);
			var selectedFiles = fileNames.join(",\n");
			var selClass = $btn.data("selected-class");

			$btn.attr("class", selClass).attr("title", selectedFiles).find(".badge").html(countFiles);
			$("#<?=$fileareaId?>").attr("title", selectedFiles).html(selectedFiles);
		})
		.parents("form").on("reset", function()
		{
			$("#<?=$buttonId?>").attr("class", "<?=$buttonClass?>").find(".badge").html("");
			$("#<?=$fileareaId?>").attr("title", "").html("");
		});
	});
</script>