<?php
/* @var $this NewsController */
/* @var $model News */
$this->pageTitle = $model->title.' - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Галерея' => '/gallery/admin',
    $model->title.' - обновление',
);
?>
<h2><?php echo $model->title.' - обновление'; ?></h2>
<?php
echo $this->renderPartial('_form', array('model'=>$model)); ?>
