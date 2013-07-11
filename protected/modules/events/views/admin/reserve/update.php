<?php
$this->pageTitle = $model->id.' редактирование';
$this->breadcrumbs = array(
  'Администрирование' => '/admin',
  'События' => '/events/admin/index',
  'Заявки' => '/events/admin/reserve/index',
);
?>
<h2>Заявка на <?php echo Yii::app()->dateFormatter->format("dd MMMM y", $model->date_start) ?> г.</h2>
<?php if(Yii::app()->user->hasFlash('eventreserve_success_edited')): ?>
    <div class="bs-docs-example">
        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Выполнено!</strong> <?php echo Yii::app()->user->getFlash('eventreserve_success_edited'); ?>
        </div>
    </div>
<?php endif; ?>
<?php $this->renderPartial('application.modules.events.views.reserve._form', array('model' => $model)); ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/bootstrap-alert.js', CClientScript::POS_END); ?>