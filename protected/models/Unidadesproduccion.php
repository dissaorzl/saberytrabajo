<?php

/**
 * This is the model class for table "viviendo.mvv_unidades_produccion".
 *
 * The followings are the available columns in table 'viviendo.mvv_unidades_produccion':
 * @property integer $cod_uni_pro
 * @property string $des_uni
 * @property string $cod_edo
 * @property string $cod_mun
 * @property string $cod_par
 * @property string $dir_loc_pro
 * @property string $dir_uni_pro
 * @property string $the_geom
 */
class Unidadesproduccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viviendo.mvv_unidades_produccion';
	}
	
	public $lon_pro;
	
	public $lat_pro;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_edo', 'required'),
			array('des_uni, dir_loc_pro, dir_uni_pro', 'length', 'max'=>150),
			array('cod_edo', 'length', 'max'=>2),
			array('cod_mun', 'length', 'max'=>4),
			array('cod_par', 'length', 'max'=>6),
			array('the_geom', 'safe'),
			array('lon_pro,lat_pro','numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cod_uni_pro, des_uni, cod_edo, cod_mun, cod_par, dir_loc_pro, dir_uni_pro, the_geom', 'safe', 'on'=>'search'),
		);
	}
	
	public function registraGeometria($longitud,$latitud,$codPro,$accion)
	{
	
	
		try
		{
			$geometry = "null";
			$the_geom = "";
			if(!empty($longitud) && !empty($latitud))
			{
				$the_geom = $longitud.' '. $latitud;
				$geometry = "ST_GeomFromText('POINT($the_geom)',4326)";
			}
				
			switch ($accion)
			{
				case 'U':
					$sql = "UPDATE viviendo.mvv_proyecto
					SET the_geom = $geometry
					WHERE cod_pro=$codPro;";
					break;
			}
				
				
			return Operaciones::consultarSQL($sql);
		}
		catch (Exception $e)
		{
			die('La base de datos devolvio: '.$e->getMessage());
		}
	
	}
	
	public function longitdLatitud($idPro)
	{
		if(is_numeric($idPro))
		{
			$sql = "SELECT ST_X(the_geom) AS lon_pro,ST_Y(the_geom) AS lat_pro
			FROM viviendo.mvv_unidades_produccion WHERE cod_uni_pro = $idPro;";
			return Operaciones::consultarSQL($sql);
		}
	
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_uni_pro' => 'Código',
			'des_uni' => 'Descripción Unidad',
			'cod_edo' => 'Estado',
			'cod_mun' => 'Municipio',
			'cod_par' => 'Parroquia',
			'dir_loc_pro' => 'Localidad',
			'dir_uni_pro' => 'Dirección',
			'the_geom' => 'The Geom',
			'lon_pro' => 'Longitud',
			'lat_pro' => 'Latitud',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cod_uni_pro',$this->cod_uni_pro);
		$criteria->compare('des_uni',$this->des_uni,true);
		$criteria->compare('cod_edo',$this->cod_edo,true);
		$criteria->compare('cod_mun',$this->cod_mun,true);
		$criteria->compare('cod_par',$this->cod_par,true);
		$criteria->compare('dir_loc_pro',$this->dir_loc_pro,true);
		$criteria->compare('dir_uni_pro',$this->dir_uni_pro,true);
		$criteria->compare('the_geom',$this->the_geom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Unidadesproduccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function nombre_estado() {
		$data= Parroquial::model()->findByAttributes(array('id'=>$this->cod_par));
		return $data['estado'];
	}
	
	public function nombre_municipio() {
		$data= Parroquial::model()->findByAttributes(array('id'=>$this->cod_par));
		return $data['municipio'];
	}
	
	public function nombre_parroquia() {
		$data= Parroquial::model()->findByAttributes(array('id'=>$this->cod_par));
		return $data['parroquia'];
	}
}
