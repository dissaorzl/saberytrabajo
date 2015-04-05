<?php
/* @var $this EstatusviviendaController */
/* @var $model EstatusVivienda */

$this->breadcrumbs=array(
	'Estatus Viviendas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Crear Estatus Vivienda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>