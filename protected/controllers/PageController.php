<?php

class PageController extends Controller
{
	/**
	 * @var string the index layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/news';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
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
    public function actionView($id = false , $alias_url = false)
    {
        if($id !== false){
            $model = $this->loadModel($id);
        }
        elseif($alias_url !== false) {
            $model = $this->loadModelByAlias($alias_url);
        }

        $this->render('view',array(
            'model'=>$model,
        ));
    }


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Страница не существует');
		return $model;
	}

    public function loadModelByAlias($alias)
    {
        $model = Page::model()->find(
            'alias_url = :alias', array(
            'alias' => $alias,
        ));
        if($model===null)
            throw new CHttpException(404,'Такой страницы не существует');
        return $model;
    }


    public function loadModelPublished($id)
    {
        $model=Page::model()->findByPk($id,'is_published = 1');
        if($model===null)
            throw new CHttpException(404,'Страница не существует');
        return $model;
    }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
