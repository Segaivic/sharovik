
<?php
    $this->pageTitle = $model->title.' - '.Yii::app()->name;
    unset($this->breadcrumbs);

    $this->widget('SBreadcrumbs', array(
        'params'=>array(
            'id'=>$model->id,
        )
    ));

$this->header = $model->title;
?>
<div class="clear"></div>
<!--Категория товаров-->
<div class="row" style="margin-bottom: 20px">
    <div class="span2">
        <?php echo CHtml::image($model->thumbnail); ?>
    </div>
    <div class="span<?php if($children) { echo "7"; } else { echo "10";} ?>">
        <p class="description">
            <?php echo $model->description; ?>
        </p>
    </div>
    <?php if($children): ?>
    <div class="span3">
        <div id="right-sidebar" class="span3 sidebar">
            <!-- LEFT-SIDEBAR: SIDEBAR NAVIGATION -->
            <div class="side-nav sidebar-block right-side-nav">
                <ul class="sidebar-list">
                    <?php foreach($children as $child): ?>
                        <li><?php echo CHtml::link($child->title , $child->url) ?><div class="side-tick right-side-tick"></div></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="row" style="padding: 15px 0">
    <div class="span2">
        <p><b>Сортировать:</b></p>
    </div>
    <div class="span10">
        <div class="btn-group">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                <?php echo $order['caption'] ?  $order['caption'] : 'По новизне'; ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><?php echo CHtml::link('По цене (сначала дешевые)',Yii::app()->getController()->createUrl('',CParams::params('sort','price_asc')), array('title' => 'В виде списка','tabindex' => '-1')); ?></li>
                <li><?php echo CHtml::link('По цене (сначала дорогие)',Yii::app()->getController()->createUrl('',CParams::params('sort','price_desc')), array('title' => 'В виде списка','tabindex' => '-1')); ?></li>
                <li><?php echo CHtml::link('По новизне (по возрастанию)',Yii::app()->getController()->createUrl('',CParams::params('sort','created_asc')), array('title' => 'В виде списка','tabindex' => '-1')); ?></li>
                <li><?php echo CHtml::link('По новизне (по убыванию)',Yii::app()->getController()->createUrl('',CParams::params('sort','created_desc')), array('title' => 'В виде списка','tabindex' => '-1')); ?></li>

            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="span12">
        <ul class="thumbnails listing-products">
            <?php foreach ($products as $product): ?>
            <li class="span3">
                <div class="product-box">
<!--                    <span class="sale_tag"></span>-->
                        <a href="<?php echo $product->url ?>" class="top-link"><img alt="" src="
                            <?php echo isset($product->image->thumbnail) ? $product->image->thumbnail : Yii::app()->params['nophoto']; ?>
                            " />
                        </a><br/>
                    <div class="pr_title">
                        <a href="<?php echo $product->url ?>" class="title"><?php echo CCrop::crop_str($product->title , SProducts::TITLE_LENGTH_LIMIT); ?></a><br>
                    </div>
                    <p class="price"><?php echo CHtml::encode($product->price); ?> <span class="rur">p<span>уб.</span></span></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php $this->widget('CLinkPager', array(
    'pages' => $pages,
    )); ?>

</div>
<?php Yii::app()->clientScript->registerScriptFile('/js/bootstrap-dropdown.js',CClientScript::POS_END) ?>
