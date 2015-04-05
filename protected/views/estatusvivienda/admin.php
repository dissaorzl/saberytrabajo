<?php
/* @var $this EstatusviviendaController */
/* @var $model EstatusVivienda */

$this->breadcrumbs=array(
	'Estatus Viviendas'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Estatus Vivienda', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estatus-vivienda-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Estatus Viviendas</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estatus-vivienda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cod_est_viv',
		'des_est_viv',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
