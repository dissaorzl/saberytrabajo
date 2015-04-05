<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_pos'); ?>
		<?php echo $form->textField($model,'cod_pos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_pos'); ?>
		<?php echo $form->textField($model,'des_pos',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->