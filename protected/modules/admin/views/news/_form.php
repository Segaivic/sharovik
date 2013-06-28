<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
$categoriesList = CHtml::listData($categories,
    'id', 'title');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>


	<div>
        <?php echo $form->labelEx($model,'introtext'); ?>
        <?php
            $this->widget('ext.redactor.ERedactorWidget',array(
            'model'=>$model,
            'attribute'=>'introtext',
            'options'=>array(
                'allowedTags' => Yii::app()->params['redactor']['allowedTags'],
                'convertDivs' => Yii::app()->params['redactor']['convertDivs'],
                'lang'=>'ru',
                'fileUpload'=>Yii::app()->createUrl('/admin/news/fileUpload/attr'),
                'fileUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'
                ),
                'imageUpload'=>Yii::app()->createUrl('/admin/news/imageUpload/attr'),
                'imageGetJson'=>Yii::app()->createUrl('/admin/news/imageList/attr'),
                'imageUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'),
                ),
            ));
        ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'fulltext'); ?>
        <?php
        $this->widget('ext.redactor.ERedactorWidget',array(
            'model'=>$model,
            'attribute'=>'fulltext',
            'options'=>array(
                'lang'=>'ru',
                'allowedTags' => Yii::app()->params['redactor']['allowedTags'],
                'convertDivs' => Yii::app()->params['redactor']['convertDivs'],
                'fileUpload'=>Yii::app()->createUrl('/admin/news/fileUpload/attr'),
                'fileUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'
                ),
                'imageUpload'=>Yii::app()->createUrl('/admin/news/imageUpload/attr'),
                'imageGetJson'=>Yii::app()->createUrl('/admin/news/imageList/attr'),
                'imageUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'),
            ),
        ));
        ?>
    </div>

	<div>
        <label class="checkbox">
            <?php echo $form->checkBox($model,'is_published',array('size'=>1,'maxlength'=>1)); ?> Опубликовано
        </label>
	</div>

	<div>
        <label class="checkbox">
            <?php echo $form->checkBox($model,'is_published',array('size'=>1,'maxlength'=>1)); ?> Отображать в общем списке новостей
        </label>
	</div>

	<div>
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php echo CHtml::dropDownList('News[catid]',$model->catid,$categoriesList);?>
		<?php echo $form->error($model,'catid'); ?>
	</div>
    <div>
        <?php echo $form->labelEx($model,'alias_url'); ?>
        <?php echo $form->textField($model,'alias_url',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'alias_url'); ?>
    </div>
	<div>
		<?php echo $form->labelEx($model,'metakey'); ?>
		<?php echo $form->textField($model,'metakey',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'metakey'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'metadesc'); ?>
		<?php echo $form->textField($model,'metadesc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'metadesc'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->