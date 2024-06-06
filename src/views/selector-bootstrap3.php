<?php

use gozoro\yii2\helpers\Html;

$id    = $attributes['id'];
$name  = $attributes['name'];
$value = $attributes['value'];
?>








<?//=Html::input('text', $name, $value, $attributes)?>


<div class="form-group has-feedback">

  <input type="text" class="form-control autocompleter"  <?=Html::renderTagAttributes($attributes)?>>
  <span class="glyphicon glyphicon-remove form-control-feedback" style="display:none;color:#aaa;cursor:pointer;pointer-events:auto;"  aria-hidden="true"></span>
</div>



<script>
	$(document).ready(function()
	{
		$('#<?=$id?>').autocompleter(<?=$jsItems?>, <?=$jsOptions?> )
		.on('autocompleter:select', function(event){

			console.log('select', '<?=$id?>');


			var $input = $(this);
			var $btn   = $input.parent().find('span');

			$input
			.attr('readonly', true)
			.on('keydown.selector', function(event)
			{
				switch(event.which)
				{
					case 27: remove(); return;
				}
			});

			function remove()
			{
				$input
				.attr('readonly', false)
				.removeClass('selected').off("keydown.selector").focus();
				$btn.off("click.selector").hide();


				$('#<?=$id?>').val('');
				$('input[name="<?=$name?>"]').val('');

				$input.trigger('autocompleter:unselect');
			}

			$btn.on('click.selector',remove).show();
		})
		.on('autocompleter:unselect', function(event){

			console.log('unselect', '<?=$id?>');
		});
	});


</script>