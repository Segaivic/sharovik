

<?php $this->beginContent('//layouts/main'); ?>
<div class="container_24">
    <div class="grid_24">
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
    </div>
    <div class="clear"></div>
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>