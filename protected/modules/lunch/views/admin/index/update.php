<?php
$this->pageTitle = $model->id.' редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'События' => '/events/admin/index',
);
?>
<h2><?php echo $model->id ?> - редактирование</h2>
<?php if(Yii::app()->user->hasFlash('event_success_edited')): ?>
    <div class="bs-docs-example">
        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('event_success_edited'); ?>
        </div>
    </div>
<?php endif; ?>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/bootstrap-alert.js', CClientScript::POS_END); ?>