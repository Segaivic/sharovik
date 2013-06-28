<?php
$this->pageTitle = $model->title." - ".Yii::app()->name;
$this->breadcrumbs = array(
  'События' => '/events',
  $model->title
);
$this->header = $model->title;
?>
<?php if (Yii::app()->getModule('user')->isAdmin()) : ?>
<div>
        <?php echo CHtml::link("<i class=\"icon-edit\"></i>",array('/events/admin/index/update','id' => $model->id)); ?>
        <?php echo CHtml::link("<i class=\"icon-plus\"></i>",array('/events/admin/index/create')); ?>
</div>
<?php endif; ?>
<div class="row">
    <div class="span3">
        <p>Начало: <br />
            <?php echo Yii::app()->dateFormatter->format("dd MMMM y", $model->date_start); ?>
        </p>

    </div>
    <div class="span9">
        <?php echo $model->description; ?>
    </div>
</div>