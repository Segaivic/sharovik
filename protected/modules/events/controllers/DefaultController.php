<?php

class DefaultController extends Controller
{
    public $layout = 'application.modules.events.views.layouts.events';

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCalendarEvents() {
        $items = array();
        $model = Events::model()->findAll(array(
            'select' => 'id, title , date_start, date_end, color'
        ));

        foreach ($model as $m){
            $items[]=array(
                'title'=>$m->title,
                'start'=>$m->date_start,
                'end'=>$m->date_end,
                'color'=>$m->color,
                'url'=>Yii::app()->createUrl('events/view' , array('id' => $m->id))
            );
        }

        echo CJSON::encode($items);
        Yii::app()->end();
    }
}