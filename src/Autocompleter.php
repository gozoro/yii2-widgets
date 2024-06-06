<?php

namespace gozoro\yii2\widgets;

use Yii;
use gozoro\yii2\widgets\assets\AutocompleterAsset;
use gozoro\yii2\helpers\Json;

/**
 * Autocompleter widget based on gozoro/jquery-autocompleter.
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
			$this->items = (array)$this->attributes['items'];
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