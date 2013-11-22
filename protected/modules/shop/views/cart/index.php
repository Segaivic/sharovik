<?php $this->pagetitle='Корзина - '.Yii::app()->name;
unset($this->breadcrumbs);
$this->header = 'Корзина';
?>
<?php
if(Yii::app()->user->hasFlash('success_shopping')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('success_shopping'); ?>
    <?php Yii::app()->session->destroy(); ?>
</div>
<?php
return; endif; ?>

<?php if(Yii::app()->shoppingCart->isEmpty()) {
    echo "Ваша корзина пуста";
    return;
}
?>

    <?php $this->renderPartial('_carttable'); ?>
    <?php $this->renderPartial('_order' , array ('model' => $model)); ?>
