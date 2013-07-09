<?php

class LunchPreview extends CWidget
{

	public function run()
	{
        Yii::import('application.modules.lunch.models.LunchMain');
        $model = LunchMain::model()->cache(100)->findByPk(1);
    	$this->render('lunchPreview', array('model' => $model));
  	}
}