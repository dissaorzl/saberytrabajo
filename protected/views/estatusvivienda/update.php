<?php
/* @var $this EstatusviviendaController */
/* @var $model EstatusVivienda */

$this->breadcrumbs=array(
	'Estatus Viviendas'=>array('admin'),
	$model->cod_est_viv=>array('view','id'=>$model->cod_est_viv),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear Estatus', 'url'=>array('create')),
	array('label'=>'Ver Estatus', 'url'=>array('view', 'id'=>$model->cod_est_viv)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Actualizar Estatus Vivienda <?php echo $model->cod_est_viv; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>