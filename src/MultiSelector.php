<?php

namespace gozoro\yii2\widgets;

use Yii;
use gozoro\yii2\widgets\assets\MultiSelectorAsset;
use gozoro\yii2\helpers\Json;

/**
 * Multi selector widget based on gozoro/jquery-multiselect
 *
 * See more info: https://github.com/gozoro/jquery-multiselect
 *
 * ```php
 * MultiSelector::widget([
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
 * 	'selection' => [1,2],
 * 	'placeholder'=>'Select counties',
 * ]);
 * ```
 */
class MultiSelector extends BaseWidget
{
	public $widgetView = 'multiselector-bootstrap3';

	public $items = [];

	public $selection = [];

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

		if(isset($this->attributes['selection']))
		{
			$this->selection = (array)$this->attributes['selection'];
			unset($this->attributes['selection']);
		}
		else
		{
			$this->selection = [];
		}
	}


	public function getDefaultAttributes()
	{
		return [
			'autocomplete'=> 'off',
			'class' => 'form-control',
			'multiple' => true
		];
	}

	public function getDefaultClientOptions()
	{
		return [
			'caretClass' => 'glyphicon glyphicon-menu-down'
		];
	}

	public function run()
	{
		MultiselectorAsset::register( Yii::$app->view );
		$jsOptions = Json::optionsEncode($this->clientOptions);

		return $this->render($this->widgetView, [
			'attributes' => $this->attributes,
		    'jsOptions'  => $jsOptions,
			'items'      => $this->items,
			'selection'  => $this->selection
		]);
	}
}