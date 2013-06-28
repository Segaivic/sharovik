<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sega
 * Date: 22.11.12
 * Time: 14:03
 * To change this template use File | Settings | File Templates.
 */
$this->pageTitle = CHtml::encode($category->title).' - технические характеристики';
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/bootstrap-alert.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/attributes.js' , CClientScript::POS_END);


//breadcrumbs
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'Категории товаров' => '/shopcategories/admin',
        $category->title.' - технические характеристики',

    ),
));
//breadcrumbs



?>
<br />
<?php if(Yii::app()->user->hasFlash('success')):?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>
<h2><?php
        echo CHtml::encode($category->title).' - технические характеристики';
    ?>
</h2>
    <div style="height: 30px"></div>
        <?php if(!empty($model)) {
           $this->renderPartial('_attrtable', array('model' => $model));
        } ?>

    <div class="row">

        <div class="span8">
            <h3>Новый атрибут</h3>
            <?php $this->renderPartial('_attrs', array('attr' => $attr)); ?>
        </div>
    </div>