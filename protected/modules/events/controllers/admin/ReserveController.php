<?php

class ReserveController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';


    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'ajaxOnly + Add',

        );
    }

    function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','create','update','view','delete'),
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
        $model= new EventsReserve('search');
        $model->unsetAttributes();  // clear any index values
        if(isset($_GET['EventsReserve']))
            $model->attributes=$_GET['EventsReserve'];
        $this->render('index', array(
            'model' => $model
        ));
	}

    public function actionView($id)
    {
        $model= $this->loadModel($id);
        if($model->visited == 0){
            $model->visited = EventsReserve::STATUS_ACTIVE;
            $model->save();
        }
        $this->render('view', array(
            'model' => $model
        ));
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if(isset($_POST['EventsReserve']))
        {
            $model->attributes=$_POST['EventsReserve'];
            if($model->save()){
                Yii::app()->user->setFlash('eventreserve_success_edited', "Событие успешно отредактировано");
                $this->redirect($model->id);
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
            Yii::app()->user->setFlash('success_deleted', "Удаление выполнено успешно");
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/events/admin/reserve/index'));
    }

    public function loadModel($id)
    {
        $model=EventsReserve::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Страница не существует');
        return $model;
    }

}