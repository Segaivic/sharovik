<?php
$this->breadcrumbs = array(
  'Администрирование' => '/admin/default',
  'Фотоальбомы'
);

$this->header = 'Альбомы'
?>
<div>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'gallery-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                'id',
                array(
                    'name'=>'title',
                    'type'=>'raw',
                    'value'=>'CHtml::link(CHtml::encode($data->title),\'/gallery/admin/album/\'.$data->id)'
                ),
                array(
                    'name' => 'is_published',
                    'value' => 'News::getStatus($data->is_published)',
                ),
                'created',
                array(
                    'class'=>'CButtonColumn',
                    'template'=>'{update}{delete}',
                    'htmlOptions'=>array('width'=>'70px'),
                ),
            ),
        )); ?>
</div>
<div>
    <a href="/gallery/admin/create" class="button add">Создать альбом</a>
</div>