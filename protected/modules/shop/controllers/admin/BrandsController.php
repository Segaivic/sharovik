<?php

class BrandsController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

 function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index' , 'create'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
	{
        $root=SCategories::model()->findByPk(1);
        $model=$root->children()->findAll();
        $this->render('index' , array('model'=>$model));
	}


    public function loadModel($id)
    {
        $model=SBrands::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }
}