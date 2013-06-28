<?php
/* @var $this InfoController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'content'); ?>
        <?php
        $this->widget('ext.redactor.ERedactorWidget',array(
            'model'=>$model,
            'attribute'=>'content',
            'options'=>array(
                'allowedTags' => Yii::app()->params['redactor']['allowedTags'],
                'convertDivs' => Yii::app()->params['redactor']['convertDivs'],
                'lang'=>'ru',
                'fileUpload'=>Yii::app()->createUrl('/admin/page/fileUpload/attr'),
                'fileUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'
                ),
                'imageUpload'=>Yii::app()->createUrl('/admin/page/imageUpload/attr'),
                'imageGetJson'=>Yii::app()->createUrl('/admin/page/imageList/attr'),
                'imageUploadErrorCallback'=>new CJavaScriptExpression(
                    'function(obj,json) { alert(json.error); }'),
            ),
        ));
        ?>
    </div>

	<div>
		<?php echo $form->labelEx($model,'metakey'); ?>
		<?php echo $form->textField($model,'metakey',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'metakey'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'metadesc'); ?>
		<?php echo $form->textField($model,'metadesc',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'metadesc'); ?>
	</div>

	<div>
        <label class="checkbox">
            <?php echo $form->checkBox($model,'is_published',array('size'=>1,'maxlength'=>1)); ?> Опубликовано
        </label>
	</div>


    <div>
        <?php echo $form->labelEx($model,'alias_url'); ?>
        <?php echo $form->textField($model,'alias_url',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'alias_url'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->