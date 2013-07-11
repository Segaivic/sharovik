<?php

class ReserveController extends Controller
{
    public $layout = 'application.modules.events.views.layouts.events';

    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
            ),
        );
    }

    public function accessRules() {
        return array(
            // если используется проверка прав, не забывайте разрешить доступ к
            // действию, отвечающему за генерацию изображения
            array('allow',
                'actions'=>array('captcha','index'),
                'users'=>array('*'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
        $model = new EventsReserve();
        if(isset($_POST['EventsReserve']))
        {
            $model->attributes=$_POST['EventsReserve'];

            if ($model->save()){
                Yii::app()->user->setFlash('reserved','');

//                Письмо администратору
                    $mail = new YiiMailer();
                    $mail->setView('reserve');
                    $mail->setFrom(Yii::app()->params['emailFrom'], Yii::app()->params['adminName']);
                    $mail->setTo(Yii::app()->params['adminEmail']);
                    $mail->setSubject('Новая заявка');
                    $mail->setData(array(
                        'name' => $model->name,
                        'contacts' => $model->contacts,
                        'description' => $model->description,
                        'date_start' => $model->date_start,
                        'date_end' => $model->date_end,
                    ));
                    $mail->send();
            }
        }
		$this->render('index' , array(
            'model' => $model
        ));
	}
}