<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sega
 * Date: 22.11.12
 * Time: 14:03
 * To change this template use File | Settings | File Templates.
 */
$this->pageTitle = CHtml::encode($category->title).' - технические характеристики';
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/attributes.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerCoreScript('jquery.ui');
//breadcrumbs
$this->breadcrumbs = array(
        'Администрирование' => '/admin',
        'Каталог' => '/shop/admin',
        'Категории товаров' => '/shop/admin/categories',
        $category->title.' - технические характеристики',
);
//breadcrumbs


$this->header =  CHtml::encode($category->title).' - технические характеристики';
?>
<br />
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div style="height: 30px"></div>
<?php if(!empty($model)) {
    $this->renderPartial('_tattrtable', array('model' => $model));
} ?>

<div class="row-fluid">
    <div class="span12">
        <h3>Новый атрибут</h3>
        <?php $this->renderPartial('_tattrs', array('attr' => $attr)); ?>
    </div>
</div>

