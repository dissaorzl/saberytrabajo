<?php
/* @var $this EstatusviviendaController */
/* @var $data EstatusVivienda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_est_viv')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_est_viv), array('view', 'id'=>$data->cod_est_viv)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des_est_viv')); ?>:</b>
	<?php echo CHtml::encode($data->des_est_viv); ?>
	<br />


</div>