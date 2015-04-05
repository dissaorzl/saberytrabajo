<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */

$this->menu=array(
	array('label'=>'Ver Unidades', 'url'=>array('view', 'id'=>$model->cod_uni_pro)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Actualizar Unidad de Producción <?php echo $model->cod_uni_pro; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>