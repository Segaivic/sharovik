<?php
$this->pageTitle = CHtml::encode($product->title).' - технические характеристики';

//breadcrumbs
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Товары' => '/shop/admin/product',
    $product->title.' - характеристики',
);
//breadcrumbs
?>

<div class="row-fluid">
    <div class="span9">
        <h2><?php echo CHtml::link($product->title , $product->url);
            echo CHtml::link(CHtml::image('/images/icons/edit.png'),Yii::app()->createUrl('/shop/admin/product/update',array('id' => $product->id)));
            ?>  - характеристики
        </h2>
    </div>
    <div class="span3" style="margin-top: 10px">
        <?php $this->widget('ProductActions', array('product_id' => $product->id)); ?>
    </div>
</div>
    <!--Фильтр для числовых полей-->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.numberMask.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScript("d_field_filter","
$('.digitalfield').numberMask({type:'float'});
", CClientScript::POS_END);
?>
<br />

    <!--Flash messages-->
<?php if(Yii::app()->user->hasFlash('success_deleted')):?>
    <div class="success">
         <?php echo Yii::app()->user->getFlash('success_deleted'); ?>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('success_added')):?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('success_added'); ?>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('success_changed'); ?>
    </div>
<?php endif; ?>


<?php $this->renderPartial('_attrs' , array('model' => $model)); ?>


<?php $this->renderPartial('_attrtable' , array('allAttributes' => $allAttributes , 'pid' => $product->id)); ?>
<div>
    <?php echo CHtml::link('добавить/изменить атрибуты для этого товара',Yii::app()->createUrl('/shop/admin/attributes/titles',array('id' => $product->category_id))); ?>
</div>