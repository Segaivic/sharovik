<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/blog.js' , CClientScript::POS_END);
$this->breadcrumbs=array(
    'Администрирование'=>array('/admin'),
    'блоги',
);

$this->header = "Управление новостями";

if(Yii::app()->user->hasFlash('success_deleted')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('success_deleted'); ?>
    </div>
<?php endif; ?>

<div>
    <div class="span8">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'news-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
            'id',
            array(
                'name'=>'title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
            ),
            array(
                'name' => 'is_published',
                'value' => 'News::getStatus($data->is_published)',
            ),
            array(
                'name' => 'is_onfrontpage',
                'value' => 'News::getStatus($data->is_onfrontpage)',
            ),

            array(
                'name'=>'category',
                'filter' => CHtml::listData(Categories::model()->findAll(), 'id', 'title'),
                'type' => 'raw',
                'value'=>'$data->category[\'title\']',

            ),

            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}{update}{delete}',
                'buttons'=> array(
                    'view' => array
                    (
                        'label'=>'Просмотр',
                        'url'=>'Yii::app()->createUrl("/news/view/", array("id"=>$data->id))',
                    ),
                ),
                'htmlOptions'=>array('width'=>'70px'),
            ),
        ),
    )); ?>
    </div>
    <div class="span4">
        <div class="blogs">
            <h2>Блоги</h2>
            <ul class="rightmenu y_bg">

                <?php foreach($blogs as $blog) { ?>
                <li class="adm_blogs"><?php echo CHtml::link(CHtml::encode($blog->title),$blog->url); ?>
                    <?php echo
                    CHtml::ajaxLink(
                        CHtml::image('/images/icons/edit16x16.png'),
                        CController::createUrl('/admin/news/updateblog'),
                        array(
                            'data' => array('id' => $blog->id),
                            'update' => '#newblog',
                        ),
                        array('class' => 'iconimg')
                    );
                    ?>
                    <?php echo CHtml::link(CHtml::image('/images/icons/delete16x16.png'),'#',array('id'=>'deleteblog'.$blog->id, 'class'=>'deleteblog iconimg' ,'title'=>'Удалить этот блог')); ?>
                </li>
                <?php } ?>
            </ul>
            <div id="newblog">
                <?php echo
                    CHtml::ajaxLink(
                        'Создать блог',
                        CController::createUrl('news/createblog'),
                        array(
                            'update' => '#newblog',
                        ),
                        array(
                            'class' => 'dashed',
                        )
                    );
                        ?>
            </div>
        </div>
    </div>
</div>