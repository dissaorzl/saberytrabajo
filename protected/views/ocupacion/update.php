<?php
/* @var $this OcupacionController */
/* @var $model Ocupacion */

$this->breadcrumbs=array(
	'Ocupacion'=>array('admin'),
	$model->cod_ocu=>array('view','id'=>$model->cod_ocu),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear Ocupación', 'url'=>array('create')),
	array('label'=>'Ver Ocupación', 'url'=>array('view', 'id'=>$model->cod_ocu)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Actualizar Ocupación <?php echo $model->cod_ocu; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>