<?php

class UnidadesproduccionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column_vii';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			array('CrugeAccessControlFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionMunicipios()
	{
		$data = Municipal::model()->findAll('cod_estado=:parent_id',
				array(':parent_id'=> $_POST['Unidadesproduccion']['cod_edo']));
	
	
		$data = CHtml::listData($data,'ci_munici','municipio');
		echo CHtml::tag('option',array('value' => ''),'Seleccione un municipio...',true);
		foreach($data as $id => $value)
		{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
		}
	
	}
	
	
	
	public function actionParroquia()
	{
		$data = Parroquial::model()->findAll('ci_munici=:parent_id',
				array(
						':parent_id'=> $_POST['Unidadesproduccion']['cod_mun']
				)
		);
	
		$data = CHtml::listData($data,'ci_parroq','parroquia');
		echo CHtml::tag('option',array('value' => ''),'Seleccione la parroquia...',true);
		foreach($data as $id => $value)
		{
			echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
		}
	
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Unidadesproduccion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Unidadesproduccion']))
		{
			$model->attributes=$_POST['Unidadesproduccion'];
			if($model->save())
				$model->registraGeometria($model->lon_pro, $model->lat_pro, $model->cod_uni_pro, 'U');
				$this->redirect(array('view','id'=>$model->cod_uni_pro));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Unidadesproduccion']))
		{
			$model->attributes=$_POST['Unidadesproduccion'];
			if($model->save())
				$model->registraGeometria($model->lon_pro, $model->lat_pro, $model->cod_uni_pro, 'U');
				$this->redirect(array('view','id'=>$model->cod_uni_pro));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Unidadesproduccion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Unidadesproduccion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Unidadesproduccion']))
			$model->attributes=$_GET['Unidadesproduccion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Unidadesproduccion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Unidadesproduccion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Unidadesproduccion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='unidadesproduccion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
