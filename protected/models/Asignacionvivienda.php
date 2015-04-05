<?php

/**
 * This is the model class for table "viviendo.mvv_asignacion_vivienda".
 *
 * The followings are the available columns in table 'viviendo.mvv_asignacion_vivienda':
 * @property integer $cod_asi_viv
 * @property string $num_viv_asi_viv
 * @property integer $cod_pro
 * @property integer $cod_dp_enc
 * @property integer $cod_user
 * @property string $fec_reg_asi_viv
 * @property string $act_adj_ffm
 * @property string $con_emi_ban
 * @property string $jor_con_soc
 * @property integer $cod_pos
 * @property integer $cod_est_viv
 */
class Asignacionvivienda extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Asignacionvivienda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viviendo.mvv_asignacion_vivienda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_viv_asi_viv, cod_pro, cod_dp_enc, cod_user', 'required'),
			array('num_viv_asi_viv, cod_dp_enc', 'unique'),
			array('cod_pro, cod_dp_enc, cod_user, cod_pos, cod_est_viv', 'numerical', 'integerOnly'=>true),
			array('num_viv_asi_viv', 'length', 'max'=>10),
			array('act_adj_ffm, con_emi_ban, jor_con_soc', 'length', 'max'=>1),
			array('fec_reg_asi_viv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_asi_viv, num_viv_asi_viv, cod_pro, cod_dp_enc, cod_user, fec_reg_asi_viv, act_adj_ffm, con_emi_ban, jor_con_soc, cod_pos, cod_est_viv', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'jefe'=>array(self::HAS_MANY, 'Datosencuestado', 'cod_dp_enc'),
				'proyecto' => array(self::BELONGS_TO, 'Proyecto', 'cod_pro'),
				'persona' => array(self::BELONGS_TO, 'Datosencuestado', 'cod_dp_enc'),
				'estatus' => array(self::BELONGS_TO, 'EstatusVivienda', 'cod_est_viv'),
				'postulacion' => array(self::BELONGS_TO, 'Postulacion', 'cod_pos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_asi_viv' => 'Codigo',
			'num_viv_asi_viv' => 'Numero Vivienda',
			'cod_pro' => 'Proyecto',
			'cod_dp_enc' => 'Beneficiario',
			'cod_user' => 'Usuario de Registro',
			'fec_reg_asi_viv' => 'Fecha de Registro',
			'act_adj_ffm' => '¿Acta de adjudicación provisional por el FFM?',
			'con_emi_ban' => '¿Contrato emitido por BANAVIH?',
			'jor_con_soc' => '¿Participó en la Jornada Conciencia del Deber Social?',
			'cod_pos' => 'Postulación',
			'cod_est_viv' => 'Estatus de Vivienda',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cod_asi_viv',$this->cod_asi_viv);
		$criteria->compare('num_viv_asi_viv',$this->num_viv_asi_viv,true);
		$criteria->compare('cod_pro',$this->cod_pro);
		$criteria->compare('cod_dp_enc',$this->cod_dp_enc);
		$criteria->compare('cod_user',$this->cod_user);
		$criteria->compare('fec_reg_asi_viv',$this->fec_reg_asi_viv,true);
		$criteria->compare('act_adj_ffm',$this->act_adj_ffm,true);
		$criteria->compare('con_emi_ban',$this->con_emi_ban,true);
		$criteria->compare('jor_con_soc',$this->jor_con_soc,true);
		$criteria->compare('cod_pos',$this->cod_pos);
		$criteria->compare('cod_est_viv',$this->cod_est_viv);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}