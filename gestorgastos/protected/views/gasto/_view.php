<?php
/* @var $this GastoController */
/* @var $data Gasto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Gid), array('view', 'id'=>$data->Gid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->FechaFormateada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Monto')); ?>:</b>
	<?php echo CHtml::encode($data->Monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->DescripcionCategoria); ?>
	<br />


</div>