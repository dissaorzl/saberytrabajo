<?php
/* @var $this EstatusviviendaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estatus Viviendas',
);

$this->menu=array(
	array('label'=>'Create EstatusVivienda', 'url'=>array('create')),
	array('label'=>'Manage EstatusVivienda', 'url'=>array('admin')),
);
?>

<h1>Estatus Viviendas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
