<?php
$this->pageTitle = $model->title.' - редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'Каталог' => '/shop/admin/',
  'Товары' => '/shop/admin/product/',
  'Новая товар'
);
?>
<h2><?php echo $model->title; ?></h2>
<?php $this->renderPartial('_form', array('model' => $model, 'image' => $image)); ?>
