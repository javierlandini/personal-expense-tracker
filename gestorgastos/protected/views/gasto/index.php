<?php
/* @var $this GastoController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model Gasto */

$this->breadcrumbs=array(
	'Gastos',
);

$this->menu=array(
	array('label'=>'Create Gasto', 'url'=>array('create')),
	array('label'=>'Manage Gasto', 'url'=>array('admin')),
);
?>

<h1>Gastos</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gasto-grid',
	'dataProvider'=>$model->search(true),
	'filter'=>$model,
	'columns'=>array(
		array('type' => 'date', 'name' => 'Fecha'),
		'Descripcion',
		'Monto',
		'CategoryDescription',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
