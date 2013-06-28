<?php
$this->pageTitle = $model->title.' - редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'Каталог' => '/shop/admin/',
  'Категории товаров' => '/shop/admin/categories',
  $model->title
);


?>
<?php if(Yii::app()->user->hasFlash('success_updated')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('success_updated'); ?>
    </div>
<?php endif; ?>

<h2><?php echo $model->title; ?></h2>
<?php $this->renderPartial('_form', array('model' => $model)); ?>

<div class="row-fluid">
    <div class="span12">
        <h4>Дочерние пункты:</h4>
        <?php if(!empty($items)) {
            $this->renderPartial('_items', array('model'=>$items));
        }?>
    </div>
</div>
