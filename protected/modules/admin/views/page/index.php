<?php
/* @var $this InfoController */
/* @var $model Info */
?>

<?php
//breadcrumbs
$this->breadcrumbs = array(
        'Администрирование' => '/admin',
        'Управление страницами',

    );

$this->header = "Управление страницами";
?>

        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'info-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                array(
                    'name' => 'id',
                    'htmlOptions' => array(
                        'width' => '20px',
                    ),
                ),
                array(
                    'name'=>'title',
                    'type'=>'raw',
                    'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
                ),
                'updated_at',
                /*
                'is_published',
                */
                array(
                    'class'=>'CButtonColumn',
                    'template'=>'{view}{update}{delete}',
                    'buttons'=> array(
                        'view' => array
                        (
                            'label'=>'Просмотр',
                            'url'=>'Yii::app()->createUrl("/page/view/", array("id"=>$data->id))',
                        ),
                    ),
                 ),
            ),
        )); ?>


<?php echo CHtml::link('Добавить страницу','/admin/page/create') ?>

