<?php

class IndexController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function actions()
    {
        return array(
            'fileUpload'=>array(
                'class'=>'ext.redactor.actions.FileUpload',
                'uploadCreate'=>true,
            ),
            'imageUpload'=>array(
                'class'=>'ext.redactor.actions.ImageUpload',
                'uploadCreate'=>true,
            ),
            'imageList'=>array(
                'class'=>'ext.redactor.actions.ImageList',
            ),
        );
    }

    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

 function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index , fileUpload , imageUpload , imageList'),
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
        $model = new SOrders('search');
        $model->unsetAttributes();

        if(isset($_GET['SOrders']))
            $model->attributes=$_GET['SOrders'];

        $this->render('index' , array('model' => $model));
	}


}