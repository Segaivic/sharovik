<?php

class OrdersController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';



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
                'actions'=>array('details' ,'openorder','closeorder','deleteorder','archive'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionDetails($id)
	{

        $model = $this->loadModel($id);

        if ($model->visited = SOrders::STATUS_DISABLED) {
            $model->visited = SOrders::STATUS_ACTIVE;
            $model->save();
        }

        $this->render('details' , array(
                'model' => $model,

            )
        );

    }

    public function actionCloseOrder($id) {
        $order = SOrders::model()->findByPk($id);
        $order->active = SOrders::STATUS_DISABLED;
        if($order->save()){
            $this->redirect(Yii::app()->createUrl('/shop/admin/orders/details', array('id' => $id)));

        }

    }
    public function actionOpenOrder($id) {
        $order = SOrders::model()->findByPk($id);
        $order->active = SOrders::STATUS_ACTIVE;
        $order->save();

        if($order->save()){
            $this->redirect(Yii::app()->createUrl('/shop/admin/orders/details', array('id' => $id)));

        }
    }

    public function actionDeleteorder($id)
    {
        SOrders::model()->deleteByPk($id);
        Yii::app()->user->setFlash('order_success_deleted', "Заказ был успешно удален");
        $this->redirect('/shop/admin/');
    }

    public function actionArchive() {

        $model = new SOrders('archive');

        $model->unsetAttributes();
        if(isset($_GET['SOrders']))
            $model->attributes=$_GET['SOrders'];

        $this->render('archive' , array(
                'model' => $model,

            )
        );

    }

    public function loadModel($id)
    {
        $model= SOrders::model()
            ->with('items','items.product')
            ->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

}