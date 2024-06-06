<?php

namespace gozoro\yii2\widgets\assets;

use yii\web\AssetBundle;

/**
 * Multi selector asset
 */
class MultiSelectorAsset extends AssetBundle
{

	public $sourcePath = '@vendor/gozoro/jquery-multiselect/src';
	public $js = [
		'js/jquery.multiselect.min.js',
	];

	public $css = [
		'css/jquery.multiselect.min.css'
	];

	public $jsOptions  = ['position'=>\yii\web\view::POS_HEAD];
	public $cssOptions = ['position'=>\yii\web\view::POS_HEAD];


    public $depends = [
		'yii\web\JqueryAsset',
		'app\assets\AppAsset', // asset must be added after bootstrap.css
    ];
}