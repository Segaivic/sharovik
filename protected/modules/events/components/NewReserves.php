<?php

class NewReserves extends CWidget
{

	public function run()
	{
        Yii::import('application.modules.events.models.*');
        $model = EventsReserve::model()->cache(100)->findAll(array(
            'select'=>'id, visited',
            'condition'=>'visited = '.EventsReserve::STATUS_DISABLED,
        ));

    	$this->render('newReserves', array('model' => $model));
  	}
}