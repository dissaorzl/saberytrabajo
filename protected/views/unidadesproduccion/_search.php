<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_uni_pro'); ?>
		<?php echo $form->textField($model,'cod_uni_pro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_uni'); ?>
		<?php echo $form->textField($model,'des_uni',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_edo'); ?>
		<?php echo $form->textField($model,'cod_edo',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_mun'); ?>
		<?php echo $form->textField($model,'cod_mun',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_par'); ?>
		<?php echo $form->textField($model,'cod_par',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dir_loc_pro'); ?>
		<?php echo $form->textField($model,'dir_loc_pro',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dir_uni_pro'); ?>
		<?php echo $form->textField($model,'dir_uni_pro',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'the_geom'); ?>
		<?php echo $form->textField($model,'the_geom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->