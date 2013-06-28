<?php $this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Товары',
);

$this->header = "Товары";
?>

<div class="row-fluid">
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'products-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
            'id',
            array(
                'name'=>'title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->title),$data->url)'
            ),
            array(
                'name' => 'active',
                'value' => 'CConvertValues::convBool($data->active)',
            ),

            array(
                'name'=>'category',
                'filter' => CHtml::listData(SCategories::model()->findAll(), 'id', 'title'),
                'type' => 'raw',
                'value'=>'$data->category[\'title\']',
            ),

            array(
                'class'=>'CButtonColumn',
                'template'=>'{attributes}{gallery}{view}{update}{delete}',
                'buttons'=> array(
                    'view' => array
                    (
                        'label'=>'Просмотр',
                        'url'=>'$data->url',
                    ),
                    'gallery' => array
                    (
                        'label'=>'Фото',
                        'imageUrl'=>'/images/icons/gallery16x16.png',
                        'url'=>'Yii::app()->createUrl("shop/admin/product/gallery/", array("id"=>$data->id))',
                    ),
                    'attributes' => array
                    (
                        'label'=>'Характеристики',
                        'imageUrl'=>'/images/icons/add16x16.png',
                        'url'=>'Yii::app()->createUrl("shop/admin/attributes/", array("id"=>$data->id))',
                    ),
                ),
                'htmlOptions'=>array('width'=>'80px'),
            ),
        ),
    )); ?>
</div>
<div class="row-fluid">
    <?php echo CHtml::link('<i class="icon-plus"></i> Добавить новый товар','/shop/admin/product/create', array('class' => 'btn blue')); ?>
</div>