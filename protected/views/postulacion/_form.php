<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'postulacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'des_pos'); ?>
		<?php echo $form->textField($model,'des_pos',array('size'=>100,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'des_pos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Agregar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->