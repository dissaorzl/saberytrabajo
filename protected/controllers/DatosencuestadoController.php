<?php

class DatosencuestadoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column_v';

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
	
	
	public function actionMunicipios()
	{
		$data = Municipal::model()->findAll('cod_estado=:parent_id',
				array(':parent_id'=> $_POST['Datosencuestado']['cod_edo']));
	
	
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
						':parent_id'=> $_POST['Datosencuestado']['cod_mun']
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Datosencuestado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Datosencuestado']))
		{
			$model->attributes=$_POST['Datosencuestado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_dp_enc));
		}

		$this->render('crearencuesta',array(
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

		if(isset($_POST['Datosencuestado']))
		{
			$model->attributes=$_POST['Datosencuestado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_dp_enc));
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
		$dataProvider=new CActiveDataProvider('Datosencuestado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Datosencuestado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Datosencuestado']))
			$model->attributes=$_GET['Datosencuestado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Datosencuestado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Datosencuestado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Datosencuestado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='datosencuestado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
