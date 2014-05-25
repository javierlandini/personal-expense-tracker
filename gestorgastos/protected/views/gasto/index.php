<?php
/* @var $this GastoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gastos',
);

$this->menu=array(
	array('label'=>'Create Gasto', 'url'=>array('create')),
	array('label'=>'Manage Gasto', 'url'=>array('admin')),
);
?>

<h1>Gastos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
