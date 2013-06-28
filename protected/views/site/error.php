<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="container_24">
    <div class="grid_24" style="margin-top: 10px;">
        <h2>Ошибка <?php echo $code; ?></h2>

        <div class="error">
            <?php echo CHtml::encode($message); ?>
        </div>
    </div>
    <div class="clear"></div>

</div>
