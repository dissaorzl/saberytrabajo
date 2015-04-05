<?php
/* @var $this AsignacionviviendaController */
/* @var $model Asignacionvivienda */
/* @var $form CActiveForm */
?>
<style type="text/css">
<!--
.tabla-int {
   width: 100%;
   border: 1px solid #000;
}
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
   text-align: center;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}

th {
   background: #FC4747;
}
.td-int
{
	background: #eee;
}
-->
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asignacionvivienda-form',
	'enableAjaxValidation'=>false,
)); ?>

	<fieldset><LEGEND align="left">Asignación Vivienda</LEGEND>	
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'num_viv_asi_viv'); ?>
					<?php echo $form->textField($model,'num_viv_asi_viv',array('size'=>20,'maxlength'=>10)); ?>
					<?php echo $form->error($model,'num_viv_asi_viv'); ?>
				</div>
				
				<div class="span4">
					<?php echo $form->labelEx($model,'cod_pro'); ?>
					<?php
				             $proyecto = new CDbCriteria;
				             $proyecto->order = 'nom_pro ASC';
				            // $Proyecto->condition  = 't.viv_asi_pro::numeric < t.num_tot_viv_pro::numeric';
				       ?>
						<?php
				             echo $form->dropDownList($model,'cod_pro',
									CHtml::listData(Proyecto::model()->findAll($proyecto),'cod_pro','nom_pro'),
				             						array('prompt' => 'Seleccione...', 'style'=>'width:220px;'
									)
							);
				       ?>
					<?php echo $form->error($model,'cod_pro'); ?>
				</div>
			</div>
				
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'cod_dp_enc'); ?>
					<?php
						$value='';
			            if ($model->cod_dp_enc!='')
						{
							$datos = Datosencuestado::model()->findByPk($model->cod_dp_enc);
							$value= $datos->ced_dp_enc;//$model->jefe->ced_dp_enc;
						}
						
						echo $form->hiddenField($model, 'cod_dp_enc');
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'name'=>'cod_dp_enc',
						'model'=>$model,
						'value'=>$value,
						'sourceUrl'=>$this->createUrl('Listarjefefamiliar'),
						'options'=>array(
							'minLength'=>'3',
							'showAnim'=>'fold',
							'select' => 'js:function(event, ui)
							{ jQuery("#Asignacionvivienda_cod_dp_enc").val(ui.item["id"]); }',
							'search'=> 'js:function(event, ui)
							{ jQuery("#Asignacionvivienda_cod_dp_enc").val(0); }'
						),
						));
			      	 ?>
					<?php echo $form->error($model,'cod_dp_enc'); ?>
				</div>
				<div class="span4">
			        <?php echo $form->labelEx($model,'act_adj_ffm'); ?>
			        <?php echo CHtml::dropDownList('Asignacionvivienda[act_adj_ffm]', $model, 
              				array('S' => 'Si', 'N' => 'No'),
							array('empty' => 'Seleccione...','style'=>'width:220px;'));
					?>
			        <?php echo $form->error($model,'act_adj_ffm'); ?>
				</div>
			</div>
			
			<div class="row">
			    <div class="span3">
			        <?php echo $form->labelEx($model,'con_emi_ban'); ?>
			        <?php echo CHtml::dropDownList('Asignacionvivienda[con_emi_ban]', $model, 
              				array('S' => 'Si', 'N' => 'No'),
							array('empty' => 'Seleccione...','style'=>'width:220px;'));
					?>
			        <?php echo $form->error($model,'con_emi_ban'); ?>
			    </div>
		
			   <div class="span4">
			        <?php echo $form->labelEx($model,'jor_con_soc'); ?>
			        <?php echo CHtml::dropDownList('Asignacionvivienda[jor_con_soc]', $model, 
              				array('S' => 'Si', 'N' => 'No'),
							array('empty' => 'Seleccione...','style'=>'width:220px;'));
					?>
			        <?php echo $form->error($model,'jor_con_soc'); ?>
			    </div>
		    </div>
		    
		    <div class="row">
			    <div class="span3">
			    	<?php echo $form->labelEx($model,'cod_pos'); ?>
			    	<?php
			             $postulacion = new CDbCriteria;
			             $postulacion->order = 'des_pos ASC';
			        ?>
					<?php
			             echo $form->dropDownList($model,'cod_pos',CHtml::listData(Postulacion::model()->findAll($postulacion),'cod_pos','des_pos'),
			             						array('prompt' => 'Seleccione la Postulación...', 'style'=>'width:220px;'
								)
						);
			        ?>
			        <?php echo $form->error($model,'cod_pos'); ?>
			    </div>
			    <div class="span4">
				    <?php echo $form->labelEx($model,'cod_est_viv'); ?>
				    <?php
			             $estatus = new CDbCriteria;
			             $estatus->order = 'des_est_viv ASC';
			        ?>
					<?php
			             echo $form->dropDownList($model,'cod_est_viv',CHtml::listData(EstatusVivienda::model()->findAll($estatus),'cod_est_viv','des_est_viv'),
			             						array('prompt' => 'Seleccione el Estatus Vivienda...', 'style'=>'width:220px;'
								)
						);
			        ?>
			        <?php echo $form->error($model,'cod_est_viv'); ?>
			    </div>
			</div>
		
				<input type="hidden" name="Asignacionvivienda[cod_user]" value="<?php echo Yii::app()->user->hasState('nom_usu');?>" />
				<?php echo $form->labelEx($model,'cod_user'); ?>
				<input type="text" readonly="readonly" name="cod_user" value="<?php echo Yii::app()->user->nom_usu;?>" />

	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->