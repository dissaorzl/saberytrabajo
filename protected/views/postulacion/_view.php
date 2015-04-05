<?php
/* @var $this PostulacionController */
/* @var $data Postulacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_pos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_pos), array('view', 'id'=>$data->cod_pos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_pos')); ?>:</b>
	<?php echo CHtml::encode($data->des_pos); ?>
	<br />


</div>