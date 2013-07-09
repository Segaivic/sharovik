<?php $this->beginContent('//layouts/main'); ?>
    <div class="page-title page-title-blue stacked-title">
        <div class="container">
            <div class="row show-grid">
                <div class="span12">
                    <h1><?php if(isset($this->header)){
                            echo CHtml::encode($this->header);
                        } ?></h1>
                </div>
            </div>
        </div>
    </div>
<div class="main-wrapper">
    <div class="main-content">
        <div class="container">
            <?php if(isset($this->breadcrumbs)):
                    if ( Yii::app()->controller->route !== 'site/index' )
                        $this->breadcrumbs = array_merge(array (Yii::t('zii','Home')=>Yii::app()->homeUrl), $this->breadcrumbs);
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                        'homeLink'=>false,
                        'tagName'=>'ul',
                        'separator'=>'',
                        'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                        'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                        'htmlOptions'=>array ('class'=>'breadcrumb')
                    )); ?><!-- breadcrumbs -->
            <?php endif; ?>
            <?php echo $content; ?>
        </div>
    </div>
<?php $this->endContent(); ?>