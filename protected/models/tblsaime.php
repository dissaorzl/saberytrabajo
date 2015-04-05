<?php
/**
 * Clase sobre la base de datos bd_saime
 * Posee como tabla o modelo tbldiex
 * @autor ypacheco
 * 
 * This is the model class for table "tbldiex".
 *
 * The followings are the available columns in table 'tbldiex':
 * @property string $strnacionalidad
 * @property integer $intcedula
 * @property string $strnombre_primer
 * @property string $strnombre_segundo
 * @property string $strapellido_primer
 * @property string $strapellido_segundo
 * @property string $dtmnacimiento
 * @property string $clvobjecion
 * @property boolean $blnborrado
 * @property string $dtmregistro
 * @property string $clvusuario
 * */
class tblsaime extends CActiveRecord{
     
  public static $bd_saime;   

  
  public function getDbConnection(){
    if(self::$bd_saime !== null){
      return self::$bd_saime;
    }else{ 
      self::$bd_saime = Yii::app()->bd_saime; if (self::$bd_saime instanceof CDbConnection){
      self::$bd_saime->setActive(true); return self::$bd_saime;
    }else 
      throw new CDbException(Yii::t('yii','Active Record requires a "bd_saime" CDbConnection application component.'));
    }
  }   
  
  /** *
   *  @return string the associated database table name 
   * */
  public function tableName() {
    return 'tbldiex';
  }
  
  public function attributeLabels()
  {
    return array(
        'strnacionalidad' => 'Strnacionalidad',
        'intcedula' => 'Intcedula',
        'strnombre_primer' => 'Strnombre Primer',
        'strnombre_segundo' => 'Strnombre Segundo',
        'strapellido_primer' => 'Strapellido Primer',
        'strapellido_segundo' => 'Strapellido Segundo',
        'dtmnacimiento' => 'Dtmnacimiento',
        'clvobjecion' => 'Clvobjecion',
        'blnborrado' => 'Blnborrado',
        'dtmregistro' => 'Dtmregistro',
        'clvusuario' => 'Clvusuario',
    );
  }
  
  
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }
  
  /**
   *  retorna persona por cedula
   * */
  public static function getPersona($strnacionalidad, $intcedula){
      
    $model=self::model()->findByPk(array('strnacionalidad'=>$strnacionalidad,'intcedula'=>$intcedula));
    return $model;
  }
  
}
?>
