<?php foreach ($model as $data) { ?>
<div class="news">
        <div class="underlined-title">
            <h2>
                <?php echo CHtml::encode($data->title); ?>
                <?php if (Yii::app()->getModule('user')->isAdmin()) {
                    echo CHtml::link(CHtml::image('/images/icons/edit.png'),array('/admin/news/update','id' => $data->id));
                } ?>
            </h2>
            <div class="text-divider5">
                <span></span>
            </div>
        </div>
        <div class="content">
            <?php echo $data->introtext; ?>
        </div>
        <div class="clear"></div>
        <div class="entry-meta">
            <span class="label"><?php echo Yii::app()->dateFormatter->format("dd MMMM y, HH:mm", $data->created); ?></span>
            <span><?php echo CHtml::link(CHtml::encode($data->category->title),$data->category->url); ?></span>
        </div>
        <?php if(!empty($data->fulltext)) :?>
        <div class="linkmore">
            <?php echo CHtml::link('Полностью',$data->url); ?>
        </div>
        <?php endif; ?>
        <div class="clear-both"></div>
</div>
<? } ?>
<div class="pagination">
    <?$this->widget('CLinkPager', array(
        'pages' => $pages,
        'header' => '',
        'firstPageLabel' => '<<',
        'lastPageLabel' => '>>',
        'firstPageCssClass' => '',
        'lastPageCssClass' => '',
        'maxButtonCount' => 8,
        'nextPageCssClass' => '',
        'previousPageCssClass' => '',
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
        'selectedPageCssClass' => 'active',
        'pages' => $pages,
        'internalPageCssClass' => '',
        'hiddenPageCssClass' => 'disabled',
        'cssFile' => false,
        'htmlOptions' => array(
            'class' => ''
        ),
    ))?>
</div>