<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Crear Unidad de Producción</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>