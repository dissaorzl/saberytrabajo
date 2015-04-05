<?php
/* @var $this EstatusviviendaController */
/* @var $model EstatusVivienda */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_est_viv'); ?>
		<?php echo $form->textField($model,'cod_est_viv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_est_viv'); ?>
		<?php echo $form->textField($model,'des_est_viv',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->