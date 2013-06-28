<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sega
 * Date: 23.11.12
 * Time: 11:45
 * To change this template use File | Settings | File Templates.
 */
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/bootstrap-alert.js' , CClientScript::POS_END);
$this->pageTitle = CHtml::encode($attr->title).' - редактирование';


//breadcrumbs
$this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Каталог' => '/shop/admin',
    'Категории товаров' => '/shop/admin/categories',
    $attr->category->title.' - характеристики' => Yii::app()->createUrl('/shop/admin/attributes/titles', array('id'=>$attr->category_id)),
    $attr->title.' - редактирование',
);
//breadcrumbs
?>

<h2><?php echo CHtml::encode($attr->title); ?> - редактирование</h2>

<!--   success flash message-->
<?php if(Yii::app()->user->hasFlash('success')):?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>


<div class="row">
    <div class="span8">
        <?php $this->renderPartial('_tattrs', array('attr' => $attr)); ?>
    </div>
</div>
