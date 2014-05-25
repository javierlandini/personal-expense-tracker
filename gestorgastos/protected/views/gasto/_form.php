<?php
/* @var $this GastoController */
/* @var $model Gasto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gasto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		<?php //echo $form->textField($model,'Fecha'); ?>
                <?php echo $form->dateField($model, 'Fecha'); ?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion', array('label' => 'Descripción')); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Monto'); ?>
		<?php echo $form->textField($model,'Monto',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'Monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdCategoria', array('label' => 'Categoría')); ?>
		<?php //echo $form->textField($model,'IdCategoria'); ?>
                <?php $categorias = Categoria::model()->findAll(); ?>
                <?php echo $form->dropDownList($model, 'IdCategoria', CHtml::listData($categorias, 'Cid', 'Descripcion')); ?>
		<?php echo $form->error($model,'IdCategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->