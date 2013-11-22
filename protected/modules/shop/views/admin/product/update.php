<?php
$this->pageTitle = $model->title.' - редактирование';
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin/',
    'Товары' => '/shop/admin/product/',
    $model->title,
);
?>
    <div class="row-fluid">
        <div class="span9">
            <h2><?php echo CHtml::link($model->title , $model->url); ?></h2>
        </div>
        <div class="span3" style="margin-top: 10px">
            <?php $this->widget('ProductActions', array('product_id' => $model->id)); ?>
        </div>
    </div>
<?php $this->renderPartial('_form', array('model' => $model, 'image'=>$image)); ?>