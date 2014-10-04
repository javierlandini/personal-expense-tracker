<?php

class GastoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			//array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array('index','view'),
			//	'users'=>array('*'),
			//),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gasto;
                $model->Fecha = date("Y-m-d");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gasto']))
		{
			$model->attributes=$_POST['Gasto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Gid));
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
                $model->Fecha = Yii::app()->dateFormatter->format("yyyy-MM-dd", $model->Fecha);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gasto']))
		{
			$model->attributes=$_POST['Gasto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Gid));
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
//		$dataProvider=new CActiveDataProvider('Gasto');
//                $criteria = new CDbCriteria();
//                $criteria->order = 'Fecha DESC';
//                $now = New DateTime();
//                $current_date_first_day_of_month = $now->format('Y-m') . '-01';
//                $db_compare_date = new CDbExpression("'$current_date_first_day_of_month'");
//                $criteria->addCondition("Fecha >= $db_compare_date");
//                $dataProvider->setCriteria($criteria);
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                $model = new Gasto();
                $model->unsetAttributes();
                if (isset($_GET['Gasto'])) {
                    $model->attributes = $_GET['Gasto'];
                    $model->setCategoryDescription($_GET['Gasto']['CategoryDescription']);
                }
                $this->render('index', array(
                    'model' => $model,
                ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gasto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gasto']))
			$model->attributes=$_GET['Gasto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gasto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gasto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gasto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gasto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
