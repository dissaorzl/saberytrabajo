<?php
/* @var $this EstatusviviendaController */
/* @var $model EstatusVivienda */

$this->breadcrumbs=array(
	'Estatus Viviendas'=>array('admin'),
	$model->cod_est_viv,
);

$this->menu=array(
	array('label'=>'Crear Estatus', 'url'=>array('create')),
	array('label'=>'Actualizar Estatus', 'url'=>array('update', 'id'=>$model->cod_est_viv)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Ver Estatus Vivienda #<?php echo $model->cod_est_viv; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_est_viv',
		'des_est_viv',
	),
)); ?>
