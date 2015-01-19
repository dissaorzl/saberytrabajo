<?php

/**
 * This is the model class for table "viviendo.mvv_parentesco_familiar".
 *
 * The followings are the available columns in table 'viviendo.mvv_parentesco_familiar':
 * @property integer $cod_par_fam
 * @property string $nom_par_fam
 * @property string $des_par_fam
 */
class Parentescofamiliar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parentescofamiliar the static model class
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
		return 'viviendo.mvv_parentesco_familiar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom_par_fam', 'required'),
			array('nom_par_fam', 'length', 'max'=>60),
			array('des_par_fam', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cod_par_fam, nom_par_fam, des_par_fam', 'safe', 'on'=>'search'),
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
			'cod_par_fam' => 'Codigo',
			'nom_par_fam' => 'Parentesco',
			'des_par_fam' => 'Descripcion',
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

		$criteria->compare('cod_par_fam',$this->cod_par_fam);
		$criteria->compare('nom_par_fam',$this->nom_par_fam,true);
		$criteria->compare('des_par_fam',$this->des_par_fam,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function descripcion($id){
		$data= self::model()->findByPk($id);
		return $descripcion=$data["nom_par_fam"];
	
	}
}