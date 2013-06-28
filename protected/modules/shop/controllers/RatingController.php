<?php

class RatingController extends Controller
{
    public function actionIndex()
    {
        if(!Yii::app()->request->isAjaxRequest) throw new CHttpException(404,'Такой страницы не существует!');
        if (Yii::app()->request->cookies['voted'.Yii::app()->request->getPost('id')] !== 'ok') {
            Yii::app()->request->cookies['voted'.Yii::app()->request->getPost('id')] = new CHttpCookie('voted'.Yii::app()->request->getPost('id'), 'ok');
            $rating = new SProductRating();
            $rating->product_id = intval(Yii::app()->request->getPost('id'));
            $rating->rating = intval(Yii::app()->request->getPost('rating'));
            $rating->save();


            echo 'Спасибо за оценку';
        }
        else {
            echo 'Вы уже оценивали этот товар';
        }

    }

}