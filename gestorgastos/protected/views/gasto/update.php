<?php
/* @var $this GastoController */
/* @var $model Gasto */

$this->breadcrumbs=array(
	'Gastos'=>array('index'),
	$model->Gid=>array('view','id'=>$model->Gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gasto', 'url'=>array('index')),
	array('label'=>'Create Gasto', 'url'=>array('create')),
	array('label'=>'View Gasto', 'url'=>array('view', 'id'=>$model->Gid)),
	array('label'=>'Manage Gasto', 'url'=>array('admin')),
);
?>

<h1>Update Gasto <?php echo $model->Gid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>