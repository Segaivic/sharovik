<?php

class NewOrders extends CWidget
{

	public function run()
	{
        Yii::import('application.modules.shop.models.*');
        $model = SOrders::model()->cache(100)->findAll(array(
            'select'=>'id, visited',
            'condition'=>'visited = '.SOrders::STATUS_DISABLED,
        ));

    	$this->render('newOrders', array('model' => $model));
  	}
}