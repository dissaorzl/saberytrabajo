<?php
/* @var $this InformacionlaboralController */
/* @var $model Informacionlaboral */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informacionlaboral-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


		<fieldset><LEGEND align="left">INFORMACIÓN LABORAL</LEGEND>	
			<div class="row">
				<div class="span4">
					<?php echo $form->labelEx($model,'cod_ocu'); ?>
					<?php
		             $ocupacion = new CDbCriteria;
		             $ocupacion->order = 'nom_ocu ASC';
			        ?>
					<?php
			             echo $form->dropDownList($model,'cod_ocu',
								CHtml::listData(Ocupacion::model()->findAll($ocupacion),'cod_ocu','nom_ocu'),
			             						array('prompt' => 'Seleccione...','class'=>'slt_opc_campos', 'style'=>'width:280px;'
								)
						);
			        ?>
			        <?php echo $form->error($model,'cod_ocu'); ?>
				</div>
				<div class="span4">
					<?php echo $form->labelEx($model,'tra_act_inf_lab'); ?>
					<input type="hidden" name="action" value="IL" />
					<input type="hidden" name="Informacionlaboral[cod_dp_enc]" value="<?php echo $id;?>" />
					<?php 
							$sel1 = array('');
							
							if(isset($model->tra_act_inf_lab) && !empty($model->tra_act_inf_lab))
							{
									
								$sel1[trim($model->tra_act_inf_lab)] = array('selected'=>'selected');
									
							}
								
							echo CHtml::dropDownList('Informacionlaboral[tra_act_inf_lab]', $model, 
			              	array('S' => 'Si', 'N' => 'No'),
							array('empty' => 'Seleccione...','options'=>$sel1, 'style'=>'width:280px;','class'=>'slt_opc_campos'));
					?>
					<?php echo $form->error($model,'tra_act_inf_lab'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span4">
					<?php echo $form->labelEx($model,'sec_tra_inf_lab'); ?>
					<?php 
							$sel2 = array('');
							
							if(isset($model->sec_tra_inf_lab) && !empty($model->sec_tra_inf_lab))
							{
									
								$sel2[trim($model->sec_tra_inf_lab)] = array('selected'=>'selected');
									
							}
							
							echo CHtml::dropDownList('Informacionlaboral[sec_tra_inf_lab]', $model, 
			              	array('F' => 'Formal', 'I' => 'Informal'),
							array('empty' => 'Seleccione...','options'=>$sel2, 'style'=>'width:280px;','class'=>'clear-error', 'disabled'=>'disabled'));
					?>
			       <?php echo $form->error($model,'cod_ocu'); ?>
				</div>
				<div class="span4">
					<?php echo $form->labelEx($model,'tip_ins_inf_lab'); ?>
					<?php 
							$sel3 = array('');
							
							if(isset($model->tip_ins_inf_lab) && !empty($model->tip_ins_inf_lab))
							{
									
								$sel3[trim($model->tip_ins_inf_lab)] = array('selected'=>'selected');
									
							}
							
							echo CHtml::dropDownList('Informacionlaboral[tip_ins_inf_lab]', $model, 
			              	array('I' => 'Independiente', 'P' => 'Publica','PV'=>'Privada'),
							array('empty' => 'Seleccione...','options'=>$sel3, 'style'=>'width:280px;','class'=>'clear-error', 'disabled'=>'disabled'));
					?>
					<?php echo $form->error($model,'tra_act_inf_lab'); ?>
				</div>
			</div>
		</fieldset>
		
		<fieldset><LEGEND align="left">FUENTE DE INGRESOS PERSONALES</LEGEND>
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'fue_ing_inf_lab'); ?>
					<?php 
							$sel4 = array('');
							
							if(isset($model->fue_ing_inf_lab) && !empty($model->fue_ing_inf_lab))
							{
									
								$resu = explode(',', $model->fue_ing_inf_lab);
								foreach ($resu as $val)
								{
									$sel4[trim($val)] = array('selected'=>'selected');
								}
									
							}
							
							echo CHtml::dropDownList('Informacionlaboral[fue_ing_inf_lab]', $model, 
			              	array('HP' => 'Honorarios Profesionales', 'P' => 'Pension del IVSS','S'=>'Salarios',
			              		  'II' => 'Ingresos Independientes','R'=>'Rentas'
					),
							array('style'=>'width:220px;height:	120px;','options'=>$sel4, 'multiple' => 'multiple','class'=>'clear-error'));
					?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'ing_per_inf_lab'); ?>
					<?php echo $form->textField($model,'ing_per_inf_lab',array('size'=>'40')); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'act_ext_inf_lab'); ?>
					<?php echo $form->textField($model,'act_ext_inf_lab',array('size'=>40,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'act_ext_inf_lab'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'mon_act_ext_inf_lab'); ?>
					<?php echo $form->textField($model,'mon_act_ext_inf_lab',array('size'=>'40')); ?>
					<?php echo $form->error($model,'mon_act_ext_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'tot_ing_per_inf_lab'); ?>
					<?php echo $form->textField($model,'tot_ing_per_inf_lab',array('size'=>'40', 'readonly'=>'readonly')); ?>
					<?php echo $form->error($model,'tot_ing_per_inf_lab'); ?>
				</div>
			</div>
		</fieldset>
		
		<fieldset><LEGEND align="left">EGRESOS PERSONALES</LEGEND>
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_ali_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_ali_inf_lab'); ?>
					<?php echo $form->error($model,'esg_ali_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_med_inf_lab'); ?>				
					<?php echo $form->textField($model,'esg_med_inf_lab'); ?>
					<?php echo $form->error($model,'esg_med_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_vic_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_vic_inf_lab'); ?>
					<?php echo $form->error($model,'esg_vic_inf_lab'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_beb_alc_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_beb_alc_inf_lab'); ?>
					<?php echo $form->error($model,'esg_beb_alc_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_edu_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_edu_inf_lab'); ?>
					<?php echo $form->error($model,'esg_edu_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_rec_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_rec_inf_lab'); ?>
					<?php echo $form->error($model,'esg_rec_inf_lab'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_ser_bas_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_ser_bas_inf_lab'); ?>
					<?php echo $form->error($model,'esg_ser_bas_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_arr_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_arr_inf_lab'); ?>
					<?php echo $form->error($model,'esg_arr_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_jue_aza_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_jue_aza_inf_lab'); ?>
					<?php echo $form->error($model,'esg_jue_aza_inf_lab'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_fam_externo_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_fam_externo_inf_lab'); ?>
					<?php echo $form->error($model,'esg_fam_externo_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_cre_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_cre_inf_lab'); ?>
					<?php echo $form->error($model,'esg_cre_inf_lab'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model,'esg_otr_inf_lab'); ?>
					<?php echo $form->textField($model,'esg_otr_inf_lab'); ?>
					<?php echo $form->error($model,'esg_otr_inf_lab'); ?>
				</div>
			</div>
		</fieldset>
				
		<fieldset><LEGEND align="left">DISTRIBUCIÓN DE TIEMPO (LUN A VIE)</LEGEND>
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_tra_reg_dis_tie'); ?>
					<input type="hidden" name="Distribuciontiempo[cod_dp_enc]" value="<?php echo $id;?>" />
					<input type="hidden" name="Distribuciontiempo[tip_dis_tie]" value="LV" />
					<?php echo $form->textField($model1,'hor_tra_reg_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_tra_reg_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_rec_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_rec_dis_tie',array('size'=>4,'maxlength'=>4)); ?>
					<?php echo $form->error($model1,'hor_rec_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_dep_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_dep_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_dep_dis_tie'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_jue_aza_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_jue_aza_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_jue_aza_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_tv_dis_tie'); ?>		
					<?php echo $form->textField($model1,'hor_tv_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_tv_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_lec_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_lec_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_lec_dis_tie'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_com_fam_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_com_fam_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_com_fam_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_otr_act_dis_tie'); ?>
					<?php echo $form->textField($model1,'hor_otr_act_dis_tie',array('size'=>5,'maxlength'=>5)); ?>
					<?php echo $form->error($model1,'hor_otr_act_dis_tie'); ?>
				</div>
			</div>
		</fieldset>
			
		<fieldset><LEGEND align="left">DISTRIBUCIÓN DE TIEMPO (SAB A DOM)</LEGEND>		
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_tra_reg_dis_tie'); ?>
					<input type="hidden" name="Distribuciontiempo2[cod_dp_enc]" value="<?php echo $id;?>" />
					<input type="hidden" name="Distribuciontiempo2[tip_dis_tie]" value="SD" />
					<input id="Distribuciontiempo2_hor_tra_reg_dis_tie" type="text" name="Distribuciontiempo2[hor_tra_reg_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_tra_reg_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_rec_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_rec_dis_tie" type="text" name="Distribuciontiempo2[hor_rec_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_rec_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_dep_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_dep_dis_tie" type="text" name="Distribuciontiempo2[hor_dep_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_dep_dis_tie'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_jue_aza_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_jue_aza_dis_tie" type="text" name="Distribuciontiempo2[hor_jue_aza_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_jue_aza_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_tv_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_tv_dis_tie" type="text" name="Distribuciontiempo2[hor_tv_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_tv_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_lec_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_lec_dis_tie" type="text" name="Distribuciontiempo2[hor_lec_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_lec_dis_tie'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_com_fam_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_com_fam_dis_tie" type="text" name="Distribuciontiempo2[hor_com_fam_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_com_fam_dis_tie'); ?>
				</div>
				<div class="span3">
					<?php echo $form->labelEx($model1,'hor_otr_act_dis_tie'); ?>
					<input id="Distribuciontiempo2_hor_otr_act_dis_tie" type="text" name="Distribuciontiempo2[hor_otr_act_dis_tie]" maxlength="5" size="5">
					<?php echo $form->error($model1,'hor_otr_act_dis_tie'); ?>
				</div>
			</div>
		</fieldset>
				
	
<div class="row buttons">
	<?php echo CHtml::Button($model->isNewRecord ? 'Registrar' : 'Guardar',array('id'=>'btn-info-laboral', 'class'=>'small blue nice button radius')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->