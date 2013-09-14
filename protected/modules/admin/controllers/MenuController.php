<?php

class MenuController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';


    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
            'ajaxOnly + MoveUp',
            'ajaxOnly + MoveDown',
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index','create','update','delete','MoveUp','MoveDown'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
        $category=Menu::model()->findByPk(1);
        $model = $category->children()->findAll();
        $this->render('index', array(
            'model'=>$model
        ));
	}

    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $model->deleteNode();
        $this->redirect('/admin/menu');
    }

    public function actionCreate(){
        $model= new Menu;

        if(isset($_POST['Menu']))
        {

            $model->attributes=$_POST['Menu'];
            $model->appendTo(Menu::model()->findByPk(intval($_POST['Menu']['root'])));
            $this->redirect(array($model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $items = $model->children()->findAll();
        echo $model->isNewRecord;
        if(isset($_POST['Menu']))
        {
            $model->attributes=$_POST['Menu'];
            $model->saveNode();
            $model->moveAsLast(Menu::model()->findByPk(intval($_POST['Menu']['root'])));
        }

        if($items === false) {
            $this->render('update', array(
                'model'=>$model
            ));
        }
        else {
            $this->render('update', array(
                'model'=>$model,
                'items'=>$items
            ));
        }
    }


    public function actionMoveUp()
    {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');

        $id = Yii::app()->request->getPost('id');
        $current = Menu::model()->findByPk($id);
        $prev = $current->prev()->find();
        $current->moveBefore($prev);

        $parent = $current->parent()->find();
        $model = $parent->children()->findAll();
        $this->renderPartial('_items' , array('model' => $model), false , true);

    }



    public function actionMoveDown()
    {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');

        $id = Yii::app()->request->getPost('id');
        $current = Menu::model()->findByPk($id);
        $next = $current->next()->find();
        $current->moveAfter($next);

        $parent = $current->parent()->find();
        $model = $parent->children()->findAll();
        $this->renderPartial('_items' , array('model' => $model), false , true);
    }



    public function loadModel($id)
    {
        $model=Menu::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadItems($id)
    {
        $model=Menu::model()->pos_min()->findAll('root_id = :root_id' , array(':root_id' => $id));
        if($model===null) {
            return false;
        }

        else {
            return $model;
        }
    }
}