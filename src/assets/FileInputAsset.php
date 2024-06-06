<?php

namespace gozoro\yii2\widgets\assets;

use yii\web\AssetBundle;

/**
 * Bootstrap 3 file input asset
 */
class FileInputAsset extends AssetBundle
{

	public $sourcePath = '@vendor/gozoro/yii2-widgets/src/resources';

	public $js = [

	];

	public $css = [
		'file.input.css'
	];

	public $jsOptions  = ['position'=>\yii\web\view::POS_HEAD];
	public $cssOptions = ['position'=>\yii\web\view::POS_HEAD];

    public $depends = [

    ];
}