<?php
/* @var $this UnidadesproduccionController */
/* @var $model Unidadesproduccion */
/* @var $form CActiveForm */
$data = $model->isNewRecord ? array('lon_pro'=>'','lat_pro'=>'') : $model->longitdLatitud($model->cod_uni_pro);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidadesproduccion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="span3">
			<?php echo $form->labelEx($model,'des_uni'); ?>
			<?php echo $form->textField($model,'des_uni',array('size'=>100,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'des_uni'); ?>
		</div>
	
		<div class="span3">
		<?php echo $form->labelEx($model,'cod_edo'); ?>
		<?php $estado = new CDbCriteria;
			$estado->select = 'cod_estado, estado';
			$estado->order = 'estado ASC';
			$sel[] = "";
			if(isset($data->cod_edo) && !empty($data->cod_edo))
				{
					$sel[$data->cod_edo] = array('selected'=>'selected');
				}
		?>
		<?php
			echo $form->dropDownList($model,'cod_edo',CHtml::listData(Estadal::model()->findAll($estado),'cod_estado','estado'),
			array(
				'ajax' => array(
				'type' => 'POST',
				'url' => CController::createUrl('unidadesproduccion/municipios'),
				'update' => '#Unidadesproduccion_cod_mun'
				),'options'=>$sel,'prompt' => 'Seleccione un Estado...', 'style'=>'width:220px;'
				)
				);
		?>
		<?php echo $form->error($model,'co_estado'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span3">
		<?php echo $form->labelEx($model,'cod_mun'); ?>
		<?php
			$municipio = new CDbCriteria;
			$municipio->select = 'ci_munici, municipio';
			$municipio->order = 'municipio ASC';
			$sel[] = "";
			if(isset($data->cod_mun) && !empty($data->cod_mun))
				{
					$sel[$data->cod_mun] = array('selected'=>'selected');
				}
		?>
		<?php
			echo $form->dropDownList($model,'cod_mun',CHtml::listData(Municipal::model()->findAll($municipio),'ci_munici','municipio'),
			array(
				'ajax' => array(
				'type' => 'POST',
				'url' => CController::createUrl('unidadesproduccion/parroquia'),
				'update' => '#Unidadesproduccion_cod_par'
				),'options'=>$sel,'prompt' => 'Seleccione un Municipio...', 'style'=>'width:220px;'
				)
			);
		?>
		<?php echo $form->error($model,'cod_mun'); ?>
		</div>
		
		
		<div class="span3">
		<?php echo $form->labelEx($model,'cod_par'); ?>
		<?php
			$parroquia = new CDbCriteria;
			$parroquia->select = 'ci_parroq, parroquia';
			$parroquia->order = 'parroquia ASC';
		?>
		<?php
			echo $form->dropDownList($model,'cod_par',CHtml::listData(Parroquial::model()->findAll($parroquia),'ci_parroq','parroquia'),
			array('prompt' => 'Seleccione una Parroquia...', 'style'=>'width:220px;'
			)
			);
		?>
		<?php echo $form->error($model,'cod_par'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="span3">
			<?php echo $form->labelEx($model,'dir_loc_pro'); ?>
			<?php echo $form->textField($model,'dir_loc_pro',array('size'=>60,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'dir_loc_pro'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'dir_uni_pro'); ?>
			<?php echo $form->textField($model,'dir_uni_pro',array('size'=>60,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'dir_uni_pro'); ?>
		</div>
	</div>

	<div class="row" >
		<div class="span3">
		<?php echo $form->labelEx($model,'lat_pro'); ?>
		<?php
			$this->widget('CMaskedTextField', array(
			'model' => $model,
			'attribute' => 'lat_pro',
			'mask' => '99.999999',
			'htmlOptions' => array('size' => 40)
			));
		?>
		<?php echo $form->error($model,'lat_pro'); ?>
		</div>
		
		<div class="span3">
		<?php echo $form->labelEx($model,'lon_pro'); ?>
		<?php
			$this->widget('CMaskedTextField', array(
			'model' => $model,
			'value'=> $data['lon_pro'],
			'attribute' => 'lon_pro',
			'mask' => '-99.999999',
			'htmlOptions' => array('size' => 40)
			));
		?>
		<?php echo $form->error($model,'lon_pro'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->