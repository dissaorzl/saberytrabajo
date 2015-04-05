<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */

$this->menu=array(
	array('label'=>'Crear Unidad', 'url'=>array('create')),
	array('label'=>'Actualizar Unidades', 'url'=>array('update', 'id'=>$model->cod_uni_pro)),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Ver Unidad de Producción #<?php echo $model->cod_uni_pro; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_uni_pro',
		'des_uni',
		array(
			'name'=>'cod_edo',
			'value'=>$model->nombre_estado(),
		),
		array(
			'name'=>'cod_mun',
			'value'=>$model->nombre_municipio(),
		),
		array(
			'name'=>'cod_par',
			'value'=>$model->nombre_parroquia(),
		),
		'dir_loc_pro',
		'dir_uni_pro',
		//'the_geom',
	),
)); ?>
