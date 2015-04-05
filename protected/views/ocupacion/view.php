<?php
/* @var $this OcupacionController */
/* @var $model Ocupacion */

$this->breadcrumbs=array(
	'Ocupacion'=>array('admin'),
	$model->cod_ocu,
);

$this->menu=array(
	array('label'=>'Crear Ocupacion', 'url'=>array('create')),
	array('label'=>'Actualizar Ocupacion', 'url'=>array('update', 'id'=>$model->cod_ocu)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Ver Ocupación #<?php echo $model->cod_ocu; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_ocu',
		'nom_ocu',
		'des_ocu',
	),
)); ?>
