<div style="float: left;">
	<h3>Consolidados Servicio Teléfono Fijo</h3>
</div>
<div align="right">
	<a href="<?php print Yii::app()->createUrl("/reportes/excel_servicio_telefonico")?>"  title="Exportar Excel">                       
      <button type="button" class="btn btn-primary">
        <span class="excel"> </span> EXCEL
      </button>
    </a>

      <a href="<?php print Yii::app()->createUrl("/reportes/pdf_servicio_telefonico")?>" title="Exportar PDF" target='_blank'> 
      <button type="button" class="btn btn-danger">
         <span class="pdf"></span> PDF
      </button>
    </a>

</div>

<br>



<?php 

$data= Reportes::consolidado_servicio_telefonico();


//print_r($data);die;

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reporte-grid',
    'dataProvider' => $data,
    'columns' => array(
 
        array(
            'header' => 'Estado',
            'name' => 'estado',
            //'value'=>'$data["MAIN_ID"]', //in the case we want something custom
        ),
        array(
            'header' => 'Si',
            'name' => 'si',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'No',
            'name' => 'noo',
            //'value'=>'$data["title"]', //in the case we want something custom
        )
    ),
));

 ?>