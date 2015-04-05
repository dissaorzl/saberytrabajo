<?php
/* @var $this PostulacionController */
/* @var $model Postulacion */

$this->breadcrumbs=array(
	'Postulación'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Postulación', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#postulacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Postulación</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'postulacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cod_pos',
		'des_pos',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
