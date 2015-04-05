<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */

$this->breadcrumbs=array(
	'Postulacion'=>array('admin'),
	$model->cod_pos=>array('view','id'=>$model->cod_pos),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Crear Postulación', 'url'=>array('create')),
	array('label'=>'Ver Postulación', 'url'=>array('view', 'id'=>$model->cod_pos)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Actualizar Postulación <?php echo $model->cod_pos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>