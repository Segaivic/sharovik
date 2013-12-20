<?php
$this->pageTitle = $product->title.' - опции';

//breadcrumbs
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Товары' => '/shop/admin/product',
    $product->title => $product->url,
    'Опции'
);
//breadcrumbs
?>
<div class="row-fluid">
    <div class="span9">
        <h1><?php echo $product->title ?> - опции</h1>
    </div>
    <div class="span3" style="margin-top: 10px">
        <?php $this->widget('ProductActions', array('product_id' => $product->id)); ?>
    </div>
</div>


<div class="row-fluid">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'products-grid',
        'dataProvider'=>$model->search($product->id),
        'columns'=>array(
            'title',
            array(
                'name' => 'active',
                'value' => 'CConvertValues::convBool($data->active)',
            ),
            array(
                'name' => 'multichoice',
                'value' => 'CConvertValues::convBool($data->multichoice)',
            ),
            array(
                'name' => 'withprice',
                'value' => 'CConvertValues::convBool($data->withprice)',
            ),
            array(
                'name' => 'withstock',
                'value' => 'CConvertValues::convBool($data->withstock)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{items}{view}{update}{delete}',
                'buttons'=> array(
                    'items' => array
                    (
                        'label'=>'Добавить опции',
                        'imageUrl'=>'/images/icons/add16x16.png',
                        'url'=>'Yii::app()->createUrl("shop/admin/adds/items", array("id"=>$data->id))',
                    ),
                    'update' => array
                    (
                        'url'=>'Yii::app()->createUrl("shop/admin/adds/updategroup", array("id"=>$data->id))',
                    ),
                    'delete' => array
                    (
                        'url'=>'Yii::app()->createUrl("shop/admin/adds/deletegroup", array("id"=>$data->id))',
                    ),
                ),
                'htmlOptions' => array('width' => '80px'),
            ),
        ),
    )); ?>
</div>
<div class="row-fluid">
    <?php $this->renderPartial('_formGroup' , array('model'=>$model)); ?>
</div>