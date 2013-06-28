<?php
/* @var $this NewsController */
/* @var $model News */
$this->pageTitle = 'Новый пост - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'блоги' => '/admin/news/index',
    'Новый пост' => '/admin/news/create'
);
$this->header = "Новый пост";
?>
<?php
echo $this->renderPartial('_form', array('model'=>$model , 'categories' => $categories)); ?>
