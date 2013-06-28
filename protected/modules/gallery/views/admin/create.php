<?php
/* @var $this NewsController */
/* @var $model News */
$this->pageTitle = 'Новый пост - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Фотоальбомы' => '/gallery/admin',
    'Новый'
);
$this->header = "Новый фотоальбом";
?>
<?php
echo $this->renderPartial('_form', array('model'=>$model)); ?>
