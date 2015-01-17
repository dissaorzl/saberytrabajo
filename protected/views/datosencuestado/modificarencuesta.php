<?php

/* @var $this DatosencuestadoController */
/* @var $model Datosencuestado */

$baseUrl = Yii::app()->request->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/jquery.css');
$cs->registerCssFile($baseUrl.'/assets/cba5058/jui/css/base/jquery-ui.css');
$cs->registerCssFile($baseUrl.'/assets/552382aa/gridview/styles.css');
// $cs->registerCssFile($baseUrl.'/css/tinyeditor.css');
$cs->registerScriptFile($baseUrl.'/assets/cba5058/jui/js/jquery-ui.min.js');
$cs->registerScriptFile($baseUrl.'/js/funciones.js');

/*$this->menu=array(
	array('label'=>'List Datosencuestado', 'url'=>array('index')),
	array('label'=>'Manage Datosencuestado', 'url'=>array('admin')),
);*/

Yii::app()->clientScript->registerScript('form_familiar', "

	$('#article_tab').show();
	var _tabs = $('#article_tab').tabs();  	
	//$('#article_tab' ).tabs({ disabled: [ 2, 3, 4, 5] }); //when initializing the tabs
	//$('#article_tab').tabs('option', 'disabled', [1, 2, 3, 4, 5] ); // or setting after init
		
	$('#btn-datos-vivienda').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#caracteristicavivienda-form').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
				
				
	$('#btn-datos-personales').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#datosencuestado-form').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
	
				
	$('#btn-condicion-salud').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#condicionsalud-form').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
					
	
	$('#btn-situacion-politica').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#situacionpolitica-form').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
		
	$('#btn-posesiones-vivienda').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#posesionesvivienda-form').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
		
		
	$('#btn-info-laboral').click(function(e)
	{		
		_op = {param:{}};
		_op.param = $('#informacionlaboral-form').serialize();
		//_op.param.form = $('#distribuciontiempo-form').serialize();
		_op.param.form2 = $('#distribuciontiempo-form22').serialize();
		_url = '".Yii::app()->createUrl('/datosencuestado/modificar')."';
		_op.tipo = 'dialog';
		_op.contentMsj = 'mensaje';			
		_res = registrarFormulario(_url,_op);			
		
		
	});
				
	$('#Datosencuestado_sex_dp_enc').change(function()
	{
		var _valor= $(this).find('option:selected').val();
				
		if(_valor == 'F')
		{
			$('.tr_depende_sexo').css('display','');
		}
		else
		{
			$('.tr_depende_sexo').css('display','none');
		}
	});
				
	$('.slt_opc_campos').change(function()
	{
		_attr = $(this).attr('id');
		_valor = $('#'+_attr).find('option:selected').val();
		_text = $('#'+_attr).find('option:selected').text();
		
		switch(_attr)
		{
			case 'Datosencuestado_es_ind_dp_enc':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Datosencuestado_cod_com_ind');
					break;
					case 'N':
						bloquearDesbloquear('B','Datosencuestado_cod_com_ind');
					break;
				}
				
			break;
			case 'Datosencuestado_est_act_dp_enc':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Datosencuestado_tip_ins_dp_enc');
					break;
					case 'N':
						bloquearDesbloquear('B','Datosencuestado_tip_ins_dp_enc');
						bloquearDesbloquear('D','Datosencuestado_cod_mot_est');
						bloquearDesbloquear('D','Datosencuestado_cod_mot_est');
					break;
				}
			break;
			case 'Datosencuestado_fam_pri_lib_dp_enc':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Datosencuestado_cod_par_fam');
						bloquearDesbloquear('D','Datosencuestado_cod_cen_pen');
					break;
					case 'N':
						bloquearDesbloquear('B','Datosencuestado_cod_par_fam');
						bloquearDesbloquear('B','Datosencuestado_cod_cen_pen');
					break;
				}
			break;
			case 'Datosencuestado_org_soc_dp_enc':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Datosencuestado_cod_org_soc');
					break;
					case 'N':
						bloquearDesbloquear('B','Datosencuestado_cod_org_soc');
					break;
				}
			break;
			case 'Datosencuestado_mis_soc_dp_enc':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Datosencuestado_cod_mis_soc');
					break;
					case 'N':
						bloquearDesbloquear('B','Datosencuestado_cod_mis_soc');
					break;
				}
			break;
			case 'Situacionpolitica_reg_ele_sit_pol':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Situacionpolitica_par_pol_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_nom_cen_vot_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_cod_edo');
						bloquearDesbloquear('D','Situacionpolitica_cod_mun');
						bloquearDesbloquear('D','Situacionpolitica_cod_par');
						bloquearDesbloquear('D','Situacionpolitica_mie_mes_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_tes_mes_sit_pol');
					break;
					case 'N':
						bloquearDesbloquear('B','Situacionpolitica_par_pol_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_nom_cen_vot_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_cod_edo');
						bloquearDesbloquear('B','Situacionpolitica_cod_mun');
						bloquearDesbloquear('B','Situacionpolitica_cod_par');
						bloquearDesbloquear('B','Situacionpolitica_mie_mes_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_tes_mes_sit_pol');
					break;
				}
			break;
			case 'Situacionpolitica_par_pol_sit_pol':
				
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Situacionpolitica_cod_par_pol');
						bloquearDesbloquear('D','Situacionpolitica_res_par_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_ins_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_des_res_sit_pol');
						bloquearDesbloquear('D','Situacionpolitica_niv_dir_sit_pol');
					break;
					case 'N':
						bloquearDesbloquear('B','Situacionpolitica_cod_par_pol');
						bloquearDesbloquear('B','Situacionpolitica_res_par_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_ins_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_des_res_sit_pol');
						bloquearDesbloquear('B','Situacionpolitica_niv_dir_sit_pol');
					break;
				}
			break;
			case 'Situacionpolitica_cod_par_pol':
			
				switch(_text)
				{
					case 'Otro':
						bloquearDesbloquear('D','Situacionpolitica_otr_par_sit_pol');
					break;
					default:
						bloquearDesbloquear('B','Situacionpolitica_otr_par_sit_pol');
					break;
				}
			break;
			case 'Condicionsalud_req_ayu_tec_con_sal':
			
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Ayudarequerida_cod_ayu_tec');
					break;
					case 'N':
						bloquearDesbloquear('B','Ayudarequerida_cod_ayu_tec');
					break;
				}
			break;
			case 'Condicionsalud_tie_tip_dis_con_sal':
			
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Condicionsalud_tip_dis_con_sal');
					break;
					case 'N':
						bloquearDesbloquear('B','Condicionsalud_tip_dis_con_sal');
					break;
				}
			break;
			case 'Condicionsalud_tie_adi_con_sal':
			
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Condicionsalud_tip_adi_con_sal');
					break;
					case 'N':
						bloquearDesbloquear('B','Condicionsalud_tip_adi_con_sal');
					break;
				}
			break;
			case 'Condicionsalud_tip_adi_con_sal':
			
				switch(_valor)
				{
					case 'O':
						bloquearDesbloquear('D','Condicionsalud_otr_adi_con_sal');
					break;
					default:
						bloquearDesbloquear('B','Condicionsalud_otr_adi_con_sal');
					break;
				}
			break;
			case 'Condicionsalud_pad_enf_con_sal':
			
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Condicionsalud_rec_tra_con_sal');
						bloquearDesbloquear('D','Condicionsalud_cod_enf');
						bloquearDesbloquear('D','Condicionsalud_des_tra_con_sal');
					break;
					default:
						bloquearDesbloquear('B','Condicionsalud_rec_tra_con_sal');
						bloquearDesbloquear('B','Condicionsalud_cod_enf');
						bloquearDesbloquear('B','Condicionsalud_des_tra_con_sal');
					break;
				}
			break;
			case 'Condicionsalud_rec_tra_con_sal':
			
				switch(_valor)
				{
					case 'S':
						bloquearDesbloquear('D','Condicionsalud_tip_tra_con_sal');
					break;
					default:
						bloquearDesbloquear('B','Condicionsalud_tip_tra_con_sal');
					break;
				}
			break;
		}
	});
				
	
	function bloquearDesbloquear(opcion,atributo)
	{
		switch(opcion)
		{
			case 'D':
				$('#'+atributo).removeAttr('disabled');
			break;
			case 'B':
				$('#'+atributo).prop('selectedIndex',0);
				$('#'+atributo).prop('disabled',true);
			break;
		}
	}
				
				
	$('#ui-id-3').live('click',function()
	{
		//alert('Esta as: '+$('#codigo_maestro').val());
		//return false;
	});
		
		
",CClientScript::POS_LOAD);
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
<div class="span-23">
<h1>Agregar Datosencuestado</h1>
<div class="row">
	<div class="span-2">
		<a href="<?php echo Yii::app()->createUrl("/datosencuestado/admin")?>">
			<img title="Volver a Menu Anterior" height="45px" src="<?php echo Yii::app()->request->baseUrl.'/images/volver.jpg'; ?>">
		</a>
	</div>	
</div>
<br><br>
<br>
<div id="mydialog"></div>
<?php

$array = array('');
if($tipo == 'JF')
{
	$array = array(
			'Datos Personales'=>$this->renderPartial('_form6',
			 array('model'=>$model,'id'=>$id,'tipo'=>$tipo),true),
			'Datos Vivienda'=>$this->renderPartial('_form1',
					array('model'=>$model1,'id'=>$id),true),
			'Posesiones Vivienda'=>$this->renderPartial('_form3',
					array('model'=>$model3,'id'=>$id),true),
			'Informacion Laboral'=>$this->renderPartial('_form7',
					array('model'=>$model4,'model1'=>$model5,'model2'=>$model8,'id'=>$id),true),
			'Codicion de Salud'=>$this->renderPartial('_form5',
					array('model'=>$model6,'model1'=>$model7,'id'=>$id),true),
			'Situacion Politica'=>$this->renderPartial('_form2',
					array('model'=>$model2,'id'=>$id),true),
			/*'Deposito'=>$this->renderPartial('inspeccion/_listado',
			 array('model'=>$model,'id'=>6),true),*/
	);
}
else
{
	$array = array(
			'Datos Personales'=>$this->renderPartial('_form6',
			 array('model'=>$model,'id'=>$id,'tipo'=>$tipo),true),
			'Informacion Laboral'=>$this->renderPartial('_form7',
					array('model'=>$model4,'model1'=>$model5,'model2'=>$model8,'id'=>$id),true),
			'Codicion de Salud'=>$this->renderPartial('_form5',
					array('model'=>$model6,'model1'=>$model7,'id'=>$id),true),
			'Situacion Politica'=>$this->renderPartial('_form2',
					array('model'=>$model2,'id'=>$id),true),
			/*'Deposito'=>$this->renderPartial('inspeccion/_listado',
			 array('model'=>$model,'id'=>6),true),*/
	);
}

$this->widget('zii.widgets.jui.CJuiTabs',array(
        'id'=>'article_tab',
        'htmlOptions'=>array('class'=>'shadowaccordion','style'=>'display: none;'),  // INVISIBLE..
        'tabs'=>$array,
        'options'=>array(
                'collapsible'=>false,
        ),
));     // el ID del tab
?>
</div>