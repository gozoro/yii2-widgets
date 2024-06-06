# yii2-widgets
Yii2 widgets for Bootstrap 3.



## Datepicker


```php
<div style="width:200px;">
<?=Datepicker::widget(['name'=>'date', 'placeholder'=>'Date'])?>
</div>
```


| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/datepicker.gif) |
|-|

<details>
<summary>Example of datepicker with pick month</summary>

```php
<div style="width:200px;">
<?=Datepicker::widget([
	'name'=>'date',
	'placeholder' => 'Month',
	'readonly' => true,
	'style' => 'background:white;',
	'value' => '01.04.2024',
	'clientOptions'=>[
		'startDate' => '01.02.2024',
		'startView' => 1,
		'minViewMode' => 1,
		'todayBtn' => false,
		'todayHighlight' => false,
		'clearBtn' => true,
]])?>
</div>
```

| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/datepicker2.gif) |
|-|
</details>

<details>
<summary>Example of range datepicker</summary>

```php
<div style="width:400px">
<?=Datepicker::widget([
	'name'=>['dateBegin', 'dateEnd'],
	'value'=>['2024-05-01', '2024-05-10'],
	'placeholder'=>['begin date', 'end date'],
	'style'=>['color:red', 'color:blue'],
	'clientOptions'=>[
		'format'  =>'yyyy-mm-dd'
	]
])?>
</div>
```

| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/datepicker3.gif) |
|-|
</details>

You can use any attributes allowed for input-tag in the widget configuration. 
`clientOptions` is a special attribute for the jquery plugin options.

You can see full list of client options [here](https://bootstrap-datepicker.readthedocs.io/en/latest/options.html). You can tweak the options; results and code appear in real time below on the page of [datepicker-sandbox](https://uxsolutions.github.io/bootstrap-datepicker).

-------

## Autocompleter

Autocompleter-widget based on jquery-plugin [gozoro/jquery-autocompleter](https://github.com/gozoro/jquery-autocompleter).

```php
<div style="width:400px">

<?=Autocompleter::widget([
	'name' => 'county',
	'items' => [
			"Afghanistan",
			"Albania",
			"Algeria",
			"Andorra",
			"Angola",
			"Antigua and Barbuda",
			"Argentina",
			"Armenia",
			"Australia",
			"Austria",
			"Azerbaijan"
		],
	'clientOptions'=>[
		'value' => 'function(item, index){return index;}'
		]
])?>
</div>
```

| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/autocompleter.gif) |
|-|


-------

## Selector

Selector-widget based on jquery-plugin [gozoro/jquery-autocompleter](https://github.com/gozoro/jquery-autocompleter).

```php
<div style="width:400px">

<?=Selector::widget([
	'name' => 'county',
	'items' => [
			"Afghanistan",
			"Albania",
			"Algeria",
			"Andorra",
			"Angola",
			"Antigua and Barbuda",
			"Argentina",
			"Armenia",
			"Australia",
			"Austria",
			"Azerbaijan"
		],
	'clientOptions'=>[
		'value' => 'function(item, index){return index;}'
		]
])?>
</div>
```

| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/selector.gif) |
|-|

-------

## MultiSelector

MultiSelector-widget based on jquery-plugin [gozoro/jquery-multiselect](https://github.com/gozoro/jquery-multiselect).

```php
<div style="width:400px">
<?=MultiSelector::widget([
	'name' => 'countries[]',
	'items' => [
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan"
	],

	'selection' => [1,2],
	'placeholder'=>'Enter countries',
])?>
</div>
```

| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/multiselector.gif) |
|-|