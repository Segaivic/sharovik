<?php

class DefaultController extends Controller
{
    public $layout = 'application.modules.shop.views.layouts.shop';
    public function actionIndex()
    {
        $model = $this->loadModel(1);
        $children = $model->children()->activeOnly()->findAll();
        $this->render('index' , array('model' => $model , 'children' => $children));
    }

    public function loadModel($id)
    {
        $model=SCategories::model()
            ->activeOnly()
            ->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Извините, такой страницы не существует');
        return $model;
    }

}