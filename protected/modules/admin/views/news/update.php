<?php
/* @var $this NewsController */
/* @var $model News */
$this->pageTitle = 'Новый пост - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Новости' => '/admin/news/',
    'Редактирование',
);
?>
<h2><?php echo $model->title; ?> - редактирование</h2>
<?php echo $this->renderPartial('_form', array('model'=>$model , 'categories' => $categories)); ?>
<?php $del_linktext = '<img src="'.Yii::app()->urlManager->baseUrl.'/images/icons/remove.png" />  Эта статья больше не нужна, хочу удалить её безвовратно';
echo CHtml::link($del_linktext,"#", array("submit"=>array('delete', 'id'=>$model->id), 'confirm' => 'Уверены, что хотите удалить?'));
?>
