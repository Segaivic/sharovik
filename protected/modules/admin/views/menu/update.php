<?php
$this->pageTitle = $model->title.' - редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'Меню' => '/admin/menu',
  $model->title
);

$this->header = $model->title;
?>
<?php $this->renderPartial('_form', array('model' => $model)); ?>

<div class="row-fluid">
    <div class="span12">
        <h4>Дочерние пункты:</h4>
        <?php if(!empty($items)) {
            $this->renderPartial('_items', array('model'=>$items));
        }?>
    </div>
</div>
