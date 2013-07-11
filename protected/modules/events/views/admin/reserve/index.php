<?php
$this->pageTitle = 'Заявки - '. Yii::app()->name;
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'События' => '/events/admin/index',
    'Заявки'
);
?>
<h2>Управление заявками</h2>
<?php if(Yii::app()->user->hasFlash('success_deleted')): ?>
<div class="bs-docs-example">
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('success_deleted'); ?>
    </div>
</div>
<?php endif; ?>
<div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'products-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,

        'columns'=>array(
            array(
                'name'=>'name',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->name),\'/events/admin/reserve/view/id/\'.$data->id)'
            ),
            'name',
            'date_start',
            'date_end',
            array(
                'class'=>'CButtonColumn',
            ),


        ),

    )); ?>

</div>