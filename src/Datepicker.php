<?php

namespace gozoro\yii2\widgets;

use Yii;



use gozoro\yii2\widgets\assets\DatepickerAsset;
use gozoro\yii2\helpers\Json;


/**
 * Widget of datepicker.
 *
 * See demo: https://uxsolutions.github.io/bootstrap-datepicker
 *
 * See manual: https://bootstrap-datepicker.readthedocs.io/en/latest/options.html
 *
 * Defalut options:
 *
 * ```php
 * [
 *     'maxlength'    => 10,
 *     'autocomplete' => 'off',
 *     'clientOptions' => [
 *    	    'language'       => \Yii::$app->language,
 *  		'format'         => 'dd.mm.yyyy',
 *  		'pickTime'       => false,
 *  		'todayBtn'       => 'linked',
 *  		'autoclose'      => true,
 * 			'todayHighlight' => true
 *     ]
 * ]
 * ```
 */
class Datepicker extends BaseWidget
{
	public $datepickerView = 'datepicker-bootstrap3';
	public $datepickerRangeView = 'datepicker-range-bootstrap3';


	public function init()
	{
		parent::init();
		$this->attributes = \array_merge( $this->getDefaultAttributes(), $this->attributes );
		$this->clientOptions = \array_merge( $this->getDefaultClientOptions(), $this->clientOptions );
	}

	public function getDefaultAttributes()
	{
		return [
			'maxlength'    => 10,
			'autocomplete' => 'off',
			'class'        => 'form-control'
		];
	}

	public function getDefaultClientOptions()
	{
		return [
			'language'       => \Yii::$app->language,
			'format'         => 'dd.mm.yyyy',
			'pickTime'       => false,
			'todayBtn'       => 'linked',
			'autoclose'      => true,
			'todayHighlight' => true
		];
	}

	public function run()
    {
		DatepickerAsset::register( Yii::$app->view );
		$jsOptions = Json::optionsEncode($this->clientOptions);


		$name  = $this->attributes['name'];

		if(\is_string($name))
		{
			if(is_array($this->attributes['value']))
			{
				throw new \yii\base\Exception("Invalid datepicker attribute 'value'. Value must be string.");
			}

			return $this->render($this->datepickerView, ['attributes' => $this->attributes, 'jsOptions' => $jsOptions]);
		}
		elseif(is_array($name) and isset($name[0]) and isset($name[1]))
		{
			$attributesBegin = $this->attributes;
			$attributesEnd   = $this->attributes;

			foreach($this->attributes as $attr => $attrValue)
			{
				if(is_array($attrValue))
				{
					if(!array_key_exists(0, $attrValue) or ! array_key_exists(1, $attrValue))
					{
						throw new \yii\base\Exception("Invalid datepicker attribute '$attr'. Value must be array with 2 items.");
					}

					$attributesBegin[$attr] = $this->attributes[$attr][0];
					$attributesEnd[$attr]   = $this->attributes[$attr][1];
				}
			}

			return $this->render($this->datepickerRangeView, ['attributesBegin' => $attributesBegin, 'attributesEnd' => $attributesEnd, 'jsOptions' => $jsOptions]);
		}
		else
		{
			throw new \yii\base\Exception("Invalid name datepicker. Name must be string or array with 2 items.");
		}
    }
}
