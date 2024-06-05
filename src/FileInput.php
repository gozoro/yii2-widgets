<?php

namespace gozoro\yii2\widgets;

use Yii;
use app\widgets\assets\FileInputAsset;


class FileInput extends BaseWidget
{
	public $widgetView = 'fileinput-bootstrap3';


	public function getDefaultAttributes()
	{
		return [
			'type'                => 'button',
			'class'               => 'btn btn-default',
			'data-selected-class' => 'btn btn-success',

			'label'    => (Yii::$app->language == 'ru-RU') ? 'Прикрепить' : 'Attach a file',
			'content'  => '<i class="glyphicon glyphicon-paperclip"></i> %LABEL% <span class="badge"></span>',
			'input'    => ['id'=> uniqid('input'), 'class'=>'file-input-hidden'],
			'filearea' => ['id'=> uniqid('filearea') , 'class'=> 'file-input-filearea'],
		];
	}

	public function run()
	{
		FileInputAsset::register( Yii::$app->view );

		$inputAttributes          = $this->attributes['input'];
		$inputAttributes['name']  = $this->attributes['name'];
		$inputAttributes['value'] = $this->attributes['value'];


		$fileareaAttributes = $this->attributes['filearea'];
		$content            = str_replace('%LABEL%', $this->attributes['label'], $this->attributes['content']);

		if(isset($this->attributes['multiple']) and !isset($inputAttributes['multiple'])) $inputAttributes['multiple'] = $this->attributes['multiple'];
		if(isset($this->attributes['accept']) and !isset($inputAttributes['accept']))   $inputAttributes['accept'] = $this->attributes['accept'];

		if(isset($inputAttributes['accept']) and is_array( $inputAttributes['accept'] ))
		{
			$inputAttributes['accept'] = implode(',', array_map(function($item){return ".".trim(trim($item), '.');}, $inputAttributes['accept'] ));
		}

		unset(
			$this->attributes['name'],
			$this->attributes['value'],
			$this->attributes['input'],
			$this->attributes['filearea'],
			$this->attributes['content'],
			$this->attributes['label'],
			$this->attributes['multiple'],
			$this->attributes['accept']);

		$buttonAttributes = $this->attributes;

		return $this->render($this->widgetView, [
			'content'            => $content,
			'inputAttributes'    => $inputAttributes,
			'buttonAttributes'   => $buttonAttributes,
			'fileareaAttributes' => $fileareaAttributes,
		]);
	}
}