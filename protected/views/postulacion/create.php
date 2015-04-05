<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */

$this->breadcrumbs=array(
	'Postulacion'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Crear Postulación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>