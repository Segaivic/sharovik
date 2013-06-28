<?php
/* @var $this NewsController */
$this->pageTitle = "Новости - ".Yii::app()->name;
$this->breadcrumbs=array(
	'Новости',
);

$this->header = 'Новости';
?>

<div class="row show-grid">
    <div class="span12">
        <div class="row show-grid clear-both">
            <!-- BEGIN ARTICLE CONTENT AREA -->
            <div class="span9 main-column two-columns-right">
                <article>
                    <?php $this->renderPartial('_posts', array('model' => $model , 'pages' => $pages)); ?>
                </article>
            </div>
            <!-- END ARTICLE CONTENT AREA -->
            <!-- BEGIN RIGHT-SIDEBAR -->
            <div id="right-sidebar" class="span3 sidebar">
                <!-- LEFT-SIDEBAR: SIDEBAR NAVIGATION -->
                <div class="side-nav sidebar-block right-side-nav">
                    <ul class="sidebar-list">
                        <?php foreach ($blogs as $blog) { ?>
                            <li><?php echo CHtml::link($blog->title , $blog->url) ?><div class="side-tick right-side-tick"></div></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- END RIGHT-SIDEBAR -->

        </div>
    </div>
</div>



