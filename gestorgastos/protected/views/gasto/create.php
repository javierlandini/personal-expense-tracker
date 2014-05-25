<?php
/* @var $this GastoController */
/* @var $model Gasto */

$this->breadcrumbs=array(
	'Gastos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gasto', 'url'=>array('index')),
	array('label'=>'Manage Gasto', 'url'=>array('admin')),
);
?>

<h1>Create Gasto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>