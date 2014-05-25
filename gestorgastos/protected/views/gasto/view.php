<?php
/* @var $this GastoController */
/* @var $model Gasto */

$this->breadcrumbs=array(
	'Gastos'=>array('index'),
	$model->Gid,
);

$this->menu=array(
	array('label'=>'List Gasto', 'url'=>array('index')),
	array('label'=>'Create Gasto', 'url'=>array('create')),
	array('label'=>'Update Gasto', 'url'=>array('update', 'id'=>$model->Gid)),
	array('label'=>'Delete Gasto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gasto', 'url'=>array('admin')),
);
?>

<h1>View Gasto #<?php echo $model->Gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Gid',
		'FechaFormateada',
		'Descripcion',
		'Monto',
		'IdCategoria',
	),
)); ?>
