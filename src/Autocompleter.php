<?php

namespace app\widgets;

use Yii;
use gozoro\yii2\widgets\assets\AutocompleterAsset;
use gozoro\yii2\helpers\Json;

/**
 * Autocompleter widget based on gozoro\jquery-autocompleter.
 */
class Autocompleter extends BaseWidget
{
	public $autocompleterView = 'autocompleter-bootstrap3';

	public $variants;

	public function init()
	{
		parent::init();
		$this->attributes = \array_merge( $this->getDefaultAttributes(), $this->attributes );
		$this->clientOptions = \array_merge( $this->getDefaultClientOptions(), $this->clientOptions );

		if(isset($this->attributes['variants']))
		{
			$this->variants = $this->attributes['variants'];
			unset($this->attributes['variants']);
		}
		else
		{
			$this->variants = [];
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

		if(is_array($this->variants))
		{
			$jsVariants = json_encode($this->variants);
		}
		elseif(is_string($this->variants))
		{
			$jsVariants = '"'.$this->variants.'"'; // ajax url
		}

		return $this->render($this->autocompleterView, ['attributes' => $this->attributes, 'jsVariants'=>$jsVariants, 'jsOptions' => $jsOptions]);
	}
}