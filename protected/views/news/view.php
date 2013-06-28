<?php
//Скрипты для редактора
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/redactor.min.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/ru.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clickedit.js' , CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile('/css/redactor.css', 'screen' , CClientScript::POS_HEAD);

//description и keywords
if (!empty($model->metakey) && !empty($model->metadesc)) {
    Yii::app()->clientScript->registerMetaTag($model->metakey, 'description');
    Yii::app()->clientScript->registerMetaTag($model->metadesc, 'keywords');
} else {
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_description'], 'description');
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_keywords'], 'keywords');
}
$this->breadcrumbs=array(
	'Новости'=>array('/news'),
    $model->category->title=>$model->category->url,
	$model->title,
);

$this->pageTitle = $model->title.' - '.Yii::app()->name;
$this->header = $model->title;
?>

<div class="row show-grid">
    <div class="span12">
        <div class="row show-grid clear-both">
            <!-- BEGIN ARTICLE CONTENT AREA -->
            <div class="span9 main-column two-columns-right">
                <?php  if (Yii::app()->getModule('user')->isAdmin()) : ?>
                    <p>
                        <div style="float: left">
                            <button class="btn" onclick="exampleClickToEditNews();">Быстрое редактирование</button>
                            <button class="btn" onclick="exampleClickToSaveNews();">Сохранить</button>
                        </div>
                        <div style="float: right">
                            <?php if (Yii::app()->getModule('user')->isAdmin()) : ?>
                                <?php echo CHtml::link("<i class=\"icon-edit\"></i>",array('/admin/news/update','id' => $model->id)); ?>
                                <?php echo CHtml::link("<i class=\"icon-plus\"></i>",array('/admin/news/create')); ?>
                            <?php endif; ?>
                        </div>
                        <div class="clear-both"></div>
                    </p>
                <?php endif; ?>
                <div class="news">
                    <div class="inner">
                        <div class="introtext" id="introtext<?php echo $model->id; ?>">
                            <? echo $model->introtext; ?>
                        </div>
                        <div class="fulltext">
                            <? echo $model->fulltext; ?>
                        </div>
                        <div class="clear"></div>
                        <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                        <div class="social">
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed,moikrug,gplus,pinterest,surfingbird"></div>
                        </div>
                    </div>
                </div>
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