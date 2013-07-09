<?php
$this->pageTitle = $model->id.' редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'Бизнес-ланч' => '/lunch/admin/index',
);
?>
<h1><?php echo $model->title ?> - редактирование</h1>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
