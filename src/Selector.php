<?php

namespace gozoro\yii2\widgets;


/**
 * Select with search input.
 * Selector::widget() based on Autocompleter::widget().
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