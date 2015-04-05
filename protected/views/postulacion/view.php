<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */

$this->breadcrumbs=array(
	'Postulación'=>array('admin'),
	$model->cod_pos,
);

$this->menu=array(
	array('label'=>'Crear Postulación', 'url'=>array('create')),
	array('label'=>'Actualizar Postulación', 'url'=>array('update', 'id'=>$model->cod_pos)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Ver Postulación #<?php echo $model->cod_pos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_pos',
		'des_pos',
	),
)); ?>
