<?php
/* @var $this PostulacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postulacions',
);

$this->menu=array(
	array('label'=>'Create Postulacion', 'url'=>array('create')),
	array('label'=>'Manage Postulacion', 'url'=>array('admin')),
);
?>

<h1>Postulacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
