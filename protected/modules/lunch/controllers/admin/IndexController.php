<?php

class IndexController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';

       public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'ajaxOnly + Delete',
        );
    }

    function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','create','update'),
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
        $settings = LunchMain::model()->findByPk(1); // Общие настройки ланча
        $model = new LunchProducts(); // Модель для создания нового блюда
        $products = new LunchProducts('search');
        $products->unsetAttributes();

        if(isset($_GET['LunchProducts']))
            $model->attributes=$_GET['LunchProducts'];

        if(isset($_POST['LunchMain']))
        {
            $settings->attributes=$_POST['LunchMain'];
            if($settings->save()){
                Yii::app()->user->setFlash('lunch_success_edited', "Настройки бизнес-ланча были успешно сохранены");
                $this->redirect('/lunch/admin/index');
            }
        }


        if(isset($_POST['LunchProducts']))
        {
            $model->attributes=$_POST['LunchProducts'];
            if($model->save()){
                Yii::app()->user->setFlash('lunchproduct_success_added', "Блюдо успешно добавлено");
                $this->redirect('/lunch/admin/index');
            }

        }
        $this->render('index', array(
            'settings' => $settings,
            'model'    => $model,
            'products' => $products
        ));
	}

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if(isset($_POST['LunchProducts']))
        {
            $model->attributes=$_POST['LunchProducts'];
            if($model->save()){
                Yii::app()->user->setFlash('lunch_success_edited', "Блюдо успешно отредактировано");
                $this->redirect('/lunch/admin/index');
            }

        }
        $this->render('update', array(
            'model' => $model
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            Yii::app()->user->setFlash('success_deleted', "Блюдо успешно удалено");
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/lunch/admin/index'));
    }

    public function loadModel($id)
    {
        $model=LunchProducts::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Страница не существует');
        return $model;
    }


}