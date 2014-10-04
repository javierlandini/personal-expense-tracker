<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias',
);

$this->menu=array(
	array('label'=>'Create Categoria', 'url'=>array('create')),
	array('label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<h1>Categorias</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Cid',
		'Descripcion',
	),
)); ?>