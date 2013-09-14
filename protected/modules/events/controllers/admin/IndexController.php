<?php

class IndexController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function actions()
    {
        return array(
            'fileUpload'=>array(
                'class'=>'application.extensions.redactor.actions.FileUpload',
                'uploadCreate'=>true,
            ),
            'imageUpload'=>array(
                'class'=>'application.extensions.redactor.actions.ImageUpload',
                'uploadCreate'=>true,
            ),
            'imageList'=>array(
                'class'=>'application.extensions.redactor.actions.ImageList',
            ),
        );
    }
    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
            'ajaxOnly + Delete',
            'ajaxOnly + Add',

        );
    }

    function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','create','update','fileUpload','imageUpload','imageList'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
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


	public function actionIndex()
	{
        $model= new Events('search');
        $model->unsetAttributes();  // clear any index values
        if(isset($_GET['Events']))
            $model->attributes=$_GET['Events'];
        $this->render('index', array(
            'model' => $model
        ));
	}

    public function actionView($id)
    {
        $model= $this->loadModel($id);
        $this->render('view', array(
            'model' => $model
        ));
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if(isset($_POST['Events']))
        {
            $model->attributes=$_POST['Events'];
            if($model->save()){
                Yii::app()->user->setFlash('event_success_edited', "Событие успешно отредактировано");
                $this->redirect($model->id);
            }

        }
        $this->render('update', array(
            'model' => $model
        ));
    }

    public function actionCreate()
    {
        $model = new Events();
        if(isset($_POST['Events']))
        {
            $model->attributes=$_POST['Events'];

            if ($model->save()){
                $this->redirect(array($model->id));
            }
        }
        $this->render('create' , array(
            'model'=>$model,
        ));
    }

    public function loadModel($id)
    {
        $model=Events::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Страница не существует');
        return $model;
    }

}