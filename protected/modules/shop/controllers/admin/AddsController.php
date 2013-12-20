<?php

class AddsController extends Controller
{
    public $layout = 'application.modules.admin.layouts.admin';


    public function actions()
    {
    }

    public function filters()
    {
        return array(
            'rights', // perform access control for CRUD operations
//            'ajaxOnly + Delete',
        );
    }

    /*
     * Находит все модификации для продукта
     */
    public function actionIndex($id) {
        if(!isset($id))
            throw new CHttpException('404' , 'Страница не найдена');

        $product = SProducts::model()->find(array(
                'condition' => 't.id = :id',
                'params' => array(
                    ':id' => $id
                )
        ));

        $model = new ShopAddsGroups('search');
        if(isset($_POST['ShopAddsGroups']))
        {
            $model->attributes = $_POST['ShopAddsGroups'];
            $model->product_id = (int)$id;
            if($model->save())
                $this->redirect($id);
        }
        $this->render('index' , array(
            'product' => $product,
            'model' => $model,
        ));
    }

    public function actionUpdateGroup($id) {
        if(!isset($id))
            throw new CHttpException('404' , 'Страница не найдена');

        $model = $this->loadGroupModel($id);
        if(isset($_POST['ShopAddsGroups']))
        {
            $model->attributes = $_POST['ShopAddsGroups'];
            if($model->save()) {
                Yii::app()->user->setFlash('success_updated', "Изменения сохранены");
                $this->redirect($id);
            }
        }
        $this->render('update' , array(
            'model' => $model,
        ));
    }

    public function actionItems($id) {
        if(!isset($id))
            throw new CHttpException('404' , 'Страница не найдена');

//        Сохраняем отредактированные значения
        if(isset($_POST['item'])){
            foreach ($_POST['item'] as $key=>$value){
                $itemModel = ShopAddsItems::model()->with('group')->findByPk($key);
                $itemModel->title = $value['title'];
                if($itemModel->group->withprice == ShopAddsGroups::STATUS_ACTIVE)
                    $itemModel->price = preg_replace("/[^0-9]+/", "", $value['price']);
                if($itemModel->group->withstock == ShopAddsGroups::STATUS_ACTIVE)
                    $itemModel->in_stock = preg_replace("/[^0-9]+/", "", $value['in_stock']);
                $itemModel->save();
                unset($itemModel);
            }
            $this->redirect($id);
        }


        $mod = ShopAddsGroups::model()->find(array(
            'condition' => 't.id = :id',
            'params' => array(
                ':id' => $id
            )
        ));
        $model = ShopAddsItems::model()->findAll(array(
            'condition' => 'group_id = :id',
            'with' => 'group.product',
            'params' => array(
                ':id' => $id
            )
        ));
        $item = new ShopAddsItems();
        if(isset($_POST['ShopAddsItems']))
        {
            $item->attributes = $_POST['ShopAddsItems'];
            $item->group_id = (int)$id;
            $item->price = preg_replace("/[^0-9]+/", "", $item->price);
            if($item->save()) {
                Yii::app()->user->setFlash('success_updated', "Изменения сохранены");
                $this->redirect($id);
            }
        }

        $this->render('items' , array(
            'mod'   => $mod,
            'model' => $model,
            'item'  => $item
        ));
    }

    public function actionDeleteGroup($id)
    {
        $this->loadGroupModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            Yii::app()->user->setFlash('success_deleted', "Модфикация успешно удалена");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/news'));
    }

    public function actionDelete(){
        if(Yii::app()->request->isAjaxRequest){
            $model = $this->loadItemsModel(Yii::app()->request->getPost('id'));
            $model->delete();
        }
    }

    public function loadGroupModel($id)
    {
        $model=ShopAddsGroups::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadItemsModel($id)
    {
        $model=ShopAddsItems::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}