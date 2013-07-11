<?php
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'События' => '/events/admin/index',
    'Управление событиями'
);
?>
<h2>Управление событиями</h2>
<div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'products-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,

        'columns'=>array(
            'id',
            'title',
            'date_start',
            'date_end',
            array(
                'class'=>'CButtonColumn',
            ),


        ),

    )); ?>

</div>