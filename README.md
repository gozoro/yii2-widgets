# yii2-widgets
Yii2 widgets for Bootstrap 3.



## Datepicker

Example of a simple datepicker:

```php
<div style="width:200px;">
<?=Datepicker::widget(['name'=>'date', 'placeholder'=>'Date'])?>
</div>
```


| ![Example](https://raw.githubusercontent.com/gozoro/yii2-widgets/main/images/datepicker.gif) |
|-|

Example of datepicker with pick month:

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

Example of range datepicker:

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


You can use any attributes allowed for input-tag in the widget configuration. 
`clientOptions` is a special attribute for the jquery plugin options.

You can see full list of client options [here](https://bootstrap-datepicker.readthedocs.io/en/latest/options.html). You can tweak the options; results and code appear in real time below on the page of [datepicker-sandbox](https://uxsolutions.github.io/bootstrap-datepicker).

-------


