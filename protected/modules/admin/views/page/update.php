<?php
//breadcrumbs
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Управление страницами' => '/admin/page',
    $model->title
);
?>


<?php if(Yii::app()->user->hasFlash('success_updated')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('success_updated'); ?>
</div>
<?php endif; ?>


    <h2><?php echo CHtml::link($model->title,$model->url)." - редактирование"; ?></h2>
<div class="p5">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<?php $del_linktext = '<img src="'.Yii::app()->urlManager->baseUrl.'/images/icons/remove.png" />  Эта страница больше не нужна, хочу удалить её безвовратно';
echo CHtml::link($del_linktext,"#", array("submit"=>array('delete', 'id'=>$model->id), 'confirm' => 'Уверены, что хотите удалить?'));