<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */

$this->menu=array(
	array('label'=>'Crear Unidad de Producción', 'url'=>array('create')),
);


?>

<h1>Administrar Unidades de producciones</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidadesproduccion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cod_uni_pro',
		'des_uni',
		array(
				'name'=>'cod_edo',
				'value'=>'$data->nombre_estado()',
		),
		array(
				'name'=>'cod_mun',
				'value'=>'$data->nombre_municipio()',
		),
		array(
				'name'=>'cod_par',
				'value'=>'$data->nombre_parroquia()',
		),
		'dir_loc_pro',
		/*
		'dir_uni_pro',
		'the_geom',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
