<?php

/**
 * This is the model class for table "viviendo.mvv_motivo_estudio".
 *
 * The followings are the available columns in table 'viviendo.mvv_motivo_estudio':
 * @property integer $cod_mot_est
 * @property string $nom_mot_est
 * @property string $des_mot_est
 * @property string $est_reg
 */
class Motivoestudio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Motivoestudio the static model class
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
		return 'viviendo.mvv_motivo_estudio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom_mot_est', 'required'),
			array('nom_mot_est', 'length', 'max'=>150),
			array('est_reg', 'length', 'max'=>1),
			array('des_mot_est', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_mot_est, nom_mot_est, des_mot_est, est_reg', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_mot_est' => 'Codigo',
			'nom_mot_est' => 'Motivo',
			'des_mot_est' => 'Descripcion',
			'est_reg' => 'Estatus',
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

		$criteria->compare('cod_mot_est',$this->cod_mot_est);
		$criteria->compare('nom_mot_est',$this->nom_mot_est,true);
		$criteria->compare('des_mot_est',$this->des_mot_est,true);
		$criteria->compare('est_reg',$this->est_reg,true);
		$criteria->condition = 'est_reg=:id';
		$criteria->params = array(':id'=>'A');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}