<?php
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'События' => '/events/admin/index',
  'Новое событие'
);
?>
<h2></h2>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
