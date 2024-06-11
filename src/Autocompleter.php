<?php

namespace gozoro\yii2\widgets;

use Yii;
use gozoro\yii2\widgets\assets\AutocompleterAsset;
use gozoro\yii2\helpers\Json;

/**
 * Autocompleter widget based on gozoro/jquery-autocompleter.
 *
 * See more info: https://github.com/gozoro/jquery-autocompleter
 *
 * ```php
 * Autocompleter::widget([
 * 	'name' => 'county',
 * 	'items' => [
 * 		"Afghanistan",
 * 		"Albania",
 * 		"Algeria",
 * 		"Andorra",
 * 		"Angola",
 * 		"Antigua and Barbuda",
 * 		"Argentina",
 * 		"Armenia",
 * 		"Australia",
 * 		"Austria",
 * 		"Azerbaijan"
 * 		],
 * 	'clientOptions'=>[
 * 		'value' => 'function(item, index){return index;}'
 * 		]
 * ]);
 * ```
 *
 * Default options:
 *
 * ```php
 * [
 * 	'autocomplete'=> 'off',
 * 	'class' => 'form-control',
 * ]
 * ```
 */
class Autocompleter extends BaseWidget
{
	public $widgetView = 'autocompleter-bootstrap3';

	public $items;

	public function init()
	{
		parent::init();

		if(isset($this->attributes['items']))
		{
			$this->items = $this->attributes['items']; // string for AJAX or array to iterate through
			unset($this->attributes['items']);
		}
		else
		{
			$this->items = [];
		}
	}


	public function getDefaultAttributes()
	{
		return [
			'autocomplete'=> 'off',
			'class' => 'form-control',
		];
	}

	public function getDefaultClientOptions()
	{
		return [];
	}

	public function run()
	{
		AutocompleterAsset::register( Yii::$app->view );
		$jsOptions = Json::optionsEncode($this->clientOptions);

		if(is_array($this->items))
		{
			$jsItems = json_encode($this->items);
		}
		elseif(is_string($this->items))
		{
			$jsItems = '"'.$this->items.'"'; // ajax url
		}

		return $this->render($this->widgetView, ['attributes' => $this->attributes, 'jsItems'=>$jsItems, 'jsOptions' => $jsOptions]);
	}
}