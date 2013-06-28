<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/accessories.js' , CClientScript::POS_END);

$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Товары' => '/shop/admin/product',
    $product->title.' - рекомендуемые товары',
);

?>

<h2>Аксессуары для товара <i><?php echo CHtml::link($product->title , array('/shop/product' , 'id' => $product->id)); ?></i></h2>
<p>Код товара: <span id="code"><?php echo $product->id; ?></span></p>


<div id="acclist">
    <?php
        if ($accessories) {
            $this->renderPartial('_accview', array(
                'accessories' => $accessories,
                'product_id' => $product->id
            ));
        }
    ?>
</div>
<div style="clear:both"></div>
<div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'products-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,

        'columns'=>array(
            'id',
            'title',
            'price',
            'created_at',
            array(
                'name' => 'active',
                'value' => 'CConvertValues::convBool($data->active)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{plus}',
                'buttons'=> array(
                    'plus' => array
                    (
                        'type' => 'raw',
                        'label'=>'Добавить в список дополнительных товаров',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/add16x16.png',
                        'click'=>"addtoacc",

                    ),
                )
            ),


        ),

    )); ?>

</div>
