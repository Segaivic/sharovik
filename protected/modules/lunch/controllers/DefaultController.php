<?php

class DefaultController extends Controller
{
    public $layout = 'application.modules.lunch.views.layouts.lunch';
	public function actionIndex()
	{
        $settings = LunchMain::model()->findByPk(1);
        $model = LunchProducts::model()->findAll();
		$this->render('index', array(
            'settings' => $settings,
            'model'    => $model
        ));
	}

    public function actionLunch()
    {
        $this->renderPartial('lunch');
    }
}