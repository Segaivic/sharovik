<?php
$this->pageTitle = 'Сделать заявку - '.Yii::app()->name;
$this->breadcrumbs = array(
    'События' => '/events',
    'Заказать'
);
?>
<h2>Заказать мероприятие</h2>
    <?php if(Yii::app()->user->hasFlash('reserved')){ ?>
        <?php echo Yii::app()->user->getFlash('reserve'); ?>
        <p>
            Спасибо! Мы свяжемся с вами в ближайшее время!
        </p>
    <?php } else { ?>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    <?php } ?>