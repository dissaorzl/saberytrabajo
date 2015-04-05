<?php

/**
 * This is the model class for table "viviendo.mvv_postulacion".
 *
 * The followings are the available columns in table 'viviendo.mvv_postulacion':
 * @property integer $cod_pos
 * @property string $des_pos
 *
 * The followings are the available model relations:
 * @property MvvAsignacionVivienda[] $mvvAsignacionViviendas
 */
class Postulacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viviendo.mvv_postulacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_pos', 'length', 'max'=>150),
			array('des_pos', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cod_pos, des_pos', 'safe', 'on'=>'search'),
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
			'mvvAsignacionViviendas' => array(self::HAS_MANY, 'MvvAsignacionVivienda', 'cod_pos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_pos' => 'Codigo',
			'des_pos' => 'Descripción',
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

		$criteria->compare('cod_pos',$this->cod_pos);
		$criteria->compare('des_pos',$this->des_pos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Postulacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
