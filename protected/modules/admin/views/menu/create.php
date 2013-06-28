<?php
$this->pageTitle = $model->title.' - редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'Меню' => '/admin/menu',
  'Новый пункт меню'
);
?>
<h2><?php echo $model->title; ?></h2>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
