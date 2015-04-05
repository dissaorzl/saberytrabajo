<?php
/* @var $this OcupacionController */
/* @var $model Ocupacion */

$this->breadcrumbs=array(
	'Ocupacion'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Crear Ocupación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>