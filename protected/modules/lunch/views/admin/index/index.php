<?php
$this->breadcrumbs = array(
    'Администрирование' => '/admin/default',
    'Бизнес-ланч'
);
?>
<h1 class="page-title">
    Редактор Бизнес-ланча
</h1>

<?php if(Yii::app()->user->hasFlash('lunch_success_edited')): ?>
<div class="bs-docs-example">
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('lunch_success_edited'); ?>
    </div>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('lunchproduct_success_added')): ?>
<div class="bs-docs-example">
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('lunchproduct_success_added'); ?>
    </div>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('success_deleted')): ?>
<div class="bs-docs-example">
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('success_deleted'); ?>
    </div>
</div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('lunch_success_edited')): ?>
<div class="bs-docs-example">
    <div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('lunch_success_edited'); ?>
    </div>
</div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Настройки бизнес ланча</h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                <?php $this->renderPartial('_settingsForm' , array('settings' => $settings)); ?>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Список блюд</h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'products-grid',
                'dataProvider'=>$products->search(),
                'filter'=>$products,

                'columns'=>array(
                    'id',
                    'title',
                    'price',
                    'weight',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}{delete}',
                    ),
                ),
            )); ?>
            </div>
        </div>
    </div>
</div>


<div class="row-fluid">
    <div class="span12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>Добавить новое блюдо в меню</h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                <?php $this->renderPartial('_form' , array('model' => $model)); ?>
            </div>
        </div>
    </div>
</div>
