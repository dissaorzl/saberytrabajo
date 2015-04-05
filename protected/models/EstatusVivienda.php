<?php

/**
 * This is the model class for table "viviendo.mvv_estatus_vivienda".
 *
 * The followings are the available columns in table 'viviendo.mvv_estatus_vivienda':
 * @property integer $cod_est_viv
 * @property string $des_est_viv
 *
 * The followings are the available model relations:
 * @property MvvAsignacionVivienda[] $mvvAsignacionViviendas
 */
class EstatusVivienda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viviendo.mvv_estatus_vivienda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_est_viv', 'length', 'max'=>150),
			array('des_est_viv', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cod_est_viv, des_est_viv', 'safe', 'on'=>'search'),
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
			'mvvAsignacionViviendas' => array(self::HAS_MANY, 'MvvAsignacionVivienda', 'cod_est_viv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_est_viv' => 'Codigo',
			'des_est_viv' => 'Descripción del Estatus de la Vivienda',
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

		$criteria->compare('cod_est_viv',$this->cod_est_viv);
		$criteria->compare('des_est_viv',$this->des_est_viv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EstatusVivienda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
