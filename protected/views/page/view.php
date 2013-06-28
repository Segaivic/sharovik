<?php
//title
$this->pageTitle = $model->title." - ".Yii::app()->name;
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/redactor.min.js' , CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/redactor/ru.js' , CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/clickedit.js' , CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile('/css/redactor.css', 'screen' , CClientScript::POS_HEAD);

//description и keywords
if (!empty($model->metakey) && !empty($model->metadesc)) {
    Yii::app()->clientScript->registerMetaTag($model->metakey, 'description');
    Yii::app()->clientScript->registerMetaTag($model->metadesc, 'keywords');
} else {
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_description'], 'description');
    Yii::app()->clientScript->registerMetaTag(Yii::app()->params['meta_keywords'], 'keywords');
}
unset($this->breadcrumbs);
$this->header = $model->title;
?>

<div class="row show-grid">
    <div class="span12">
        <div class="row show-grid clear-both">
            <!-- BEGIN ARTICLE CONTENT AREA -->
            <div class="span12">
                <?php  if (Yii::app()->getModule('user')->isAdmin()) : ?>
                    <p>
                    <div style="float: left">
                        <button class="btn" onclick="exampleClickToEditPage();">Быстрое редактирование</button>
                        <button class="btn" onclick="exampleClickToSavePage();">Сохранить</button>
                    </div>
                    <div style="float: right">
                        <?php if (Yii::app()->getModule('user')->isAdmin()) : ?>
                            <?php echo CHtml::link("<i class=\"icon-edit\"></i>",array('/admin/page/update','id' => $model->id)); ?>
                            <?php echo CHtml::link("<i class=\"icon-plus\"></i>",array('/admin/page/create')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="clear-both"></div>
                    </p>
                <?php endif; ?>
                <div class="news">
                    <div class="inner">
                        <div class="content" id="content<?php echo $model->id; ?>">
                            <?php echo $model->content; ?>
                        </div>
                        <!--            яндекс закладки-->
                        <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                        <div class="social">
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed,moikrug,gplus,pinterest,surfingbird"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

