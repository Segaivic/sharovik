<?php

class CategoriesController extends Controller
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
                'actions'=>array('index' , 'create', 'moveup', 'movedown','update','delete'),
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

    public function actionMoveUp()
    {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');

        $id = Yii::app()->request->getPost('id');
        $current = SCategories::model()->findByPk($id);
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
        $current = SCategories::model()->findByPk($id);
        $next = $current->next()->find();
        $current->moveAfter($next);

        $parent = $current->parent()->find();
        $model = $parent->children()->findAll();
        $this->renderPartial('_items' , array('model' => $model), false , true);
    }

    public function actionCreate(){
        $model= new SCategories();

        if(isset($_POST['SCategories']))
        {
            $uniqid = uniqid();
            $model->attributes=$_POST['SCategories'];
            $img = CUploadedFile::getInstance($model,'thumbnail');
            if ($img){
                $model->thumbnail = '/uploads/shop/title/'.$uniqid.CTranslit::translit($img);
            }

            $model->appendTo(SCategories::model()->findByPk(intval($_POST['SCategories']['root'])));

            if ($img){
                CImageHandler::upload($img , SCategories::TMP_PATH.$uniqid.CTranslit::translit($img));
                CImageHandler::resizeAndSave(
                   SCategories::TMP_PATH.$uniqid.CTranslit::translit($img),
                    $model->thumbnail,
                    'height',
                    150
                );
                CImageHandler::delete(SCategories::TMP_PATH.$uniqid.CTranslit::translit($img));
            }

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

        if(isset($_POST['SCategories']))
        {
            $uniqid = uniqid();
            $thumb = $model->thumbnail;
            $img = CUploadedFile::getInstance($model,'thumbnail');
            if($img){
                $model->thumbnail = '/uploads/shop/title/'.$uniqid.CTranslit::translit($img);
                CImageHandler::delete($thumb);
                CImageHandler::upload($img , SCategories::TMP_PATH.$uniqid.CTranslit::translit($img));
                CImageHandler::resizeAndSave(
                    SCategories::TMP_PATH.$uniqid.CTranslit::translit($img),
                    $model->thumbnail,
                    'height',
                    150
                );
                CImageHandler::delete(SCategories::TMP_PATH.$uniqid.CTranslit::translit($img));
            };
            $model->attributes=$_POST['SCategories'];
            $model->saveNode();
            $model->moveAsLast(SCategories::model()->findByPk(intval($_POST['SCategories']['root'])));
            Yii::app()->user->setFlash('success_updated', "Изменения были успешно сохранены");
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

    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $model->deleteNode();
        $this->redirect('/shop/admin/categories');
    }

    public function loadModel($id)
    {
        $model=SCategories::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }
}