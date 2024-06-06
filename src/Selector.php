<?php

namespace gozoro\yii2\widgets;


/**
 * Select with search input based on gozoro/jquery-autocompleter.
 *
 * See more info: https://github.com/gozoro/jquery-autocompleter/
 *
 *
 * ```php
 * Selector::widget([
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
 */
class Selector extends Autocompleter
{
	public $widgetView = 'selector-bootstrap3';
}