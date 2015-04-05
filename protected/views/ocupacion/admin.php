<?php
/* @var $this OcupacionController */
/* @var $model Ocupacion */

$this->breadcrumbs=array(
	'Ocupacio'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Ocupación', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ocupacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Ocupación</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ocupacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cod_ocu',
		'nom_ocu',
		'des_ocu',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
