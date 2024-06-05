<?php

namespace gozoro\yii2\widgets;

use yii\base\Widget;


/**
 * Base widget class
 */
class BaseWidget extends Widget
{
	/**
	 * Attributes of widget-tag
	 * @var array
	 */
	public $attributes;

	/**
	 * Jquery-plugin options
	 * @var array
	 */
	public $clientOptions;

	/**
	 * Widget template view
	 * @var string
	 */
	public $widgetView;

	public function init()
	{
		parent::init();

		if(\is_null($this->attributes))
			$this->attributes = [];



		if(\is_null($this->clientOptions))
			$this->clientOptions = [];


		if(empty($this->attributes['name']))
		{
			$this->attributes['name'] = $this->getId();
		}


		if(empty($this->attributes['id']) and !empty($this->attributes['name']))
		{
			$this->attributes['id'] = $this->name2id($this->attributes['name']);
		}

		if(empty($this->attributes['value']))
		{
			$this->attributes['value'] = null;
		}


		$this->attributes = \array_merge( $this->getDefaultAttributes(), $this->attributes );
		$this->clientOptions = \array_merge( $this->getDefaultClientOptions(), $this->clientOptions );
	}


	protected function name2id($name)
	{
		$id = str_replace('[', '-', $name);
		$id = str_replace(']', '', $id);
		return \preg_replace('/\-$/', '', $id);
	}

	/**
	 * Returns array with default attribute values
	 * @return array
	 */
	public function getDefaultAttributes()
	{
		return [];
	}

	/**
	 * Returns array of default client options.
	 * @return array
	 */
	public function getDefaultClientOptions()
	{
		return [];
	}

	/**
	 * Returs HTML code with widget
	 * @return string
	 */
	public static function widget($config = [])
    {
		$widgetConfig = [];

		if(isset($config['clientOptions']))
		{
			$widgetConfig['clientOptions'] = $config['clientOptions'];
			unset($config['clientOptions']);
		}

		$widgetConfig['attributes'] = $config;

		return parent::widget($widgetConfig);
	}
}