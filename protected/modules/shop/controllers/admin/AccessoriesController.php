<?php

class AccessoriesController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';


    public function actions()
    {
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
                    'actions'=>array('view' , 'add' , 'delete'),
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

//    Список рекомендуемых товаров
    public function actionView($id) {

        $accessories = SProducts::getAccessoriesForProduct($id);
        $product = SProducts::model()->findByPk($id);

        $model=new SProducts('search');

        if(isset($_POST['SProducts']))
        {
            $model->attributes=$_POST['SProducts'];
            if($model->save())
                $this->redirect($id);
        }

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['SProducts']))
            $model->attributes=$_GET['SProducts'];

        $this->render('view' , array (
            'product' => $product,
            'accessories' => $accessories,
            'model'=>$model,
        ));
    }


    public function actionAdd() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        if (!isset($_POST['acc_id']) && isset($_POST['product_id'])) {

            throw new CHttpException(404,'Что-то пошло не так!');
        }
        else {
            $post = new SAccessories();
            $post->acc_id=intval($_POST['acc_id']);
            $post->product_id= intval($_POST['product_id']);
            $post->save();

            // Getting accessories for product
            $accessories = SProducts::getAccessoriesForProduct(intval($_POST['product_id']));

            $this->renderPartial('_accview', array('accessories' => $accessories,
                'product_id' => intval($_POST['product_id'])
            ));
        }
    }

    public function actionDelete() {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        SAccessories::model()->deleteByPk(intval($_POST['id']));
    }

}