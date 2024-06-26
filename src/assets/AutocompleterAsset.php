<?php

namespace gozoro\yii2\widgets\assets;

use yii\web\AssetBundle;

/**
 * Aautocompleter asset
 */
class AutocompleterAsset extends AssetBundle
{

	public $sourcePath = '@vendor/gozoro/jquery-autocompleter/src';
	public $js = [
		'js/jquery.autocompleter.min.js',
	];

	public $css = [
		'css/jquery.autocompleter.min.css'
	];

	public $jsOptions  = ['position'=>\yii\web\view::POS_HEAD];
	public $cssOptions = ['position'=>\yii\web\view::POS_HEAD];

    public $depends = [
		'yii\web\JqueryAsset',
    ];
}