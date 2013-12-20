<?php
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Товары' => '/shop/admin/product',
    $model->product->title => $model->product->url,
    'Опции' => '/shop/admin/adds/index/id/'.$model->product->id,
    $model->title
);
?>
<?php if(Yii::app()->user->hasFlash('success_updated')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('success_updated'); ?>
    </div>
<?php endif; ?>
<?php $this->renderPartial('_formGroup' , array('model' => $model)); ?>