<?php

class ViewController extends Controller
{
    public $layout = 'application.modules.events.views.layouts.events';
	public function actionIndex($id)
	{
        $model = $this->loadModel($id);
		$this->render('index' , array('model' => $model));
	}


    public function loadModel($id)
    {
        $model=Events::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'Такой страницы не существует');
        return $model;
    }

}