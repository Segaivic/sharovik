<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <div class="span6">
            <div>
                <?php echo $form->labelEx($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>
            <div>
                <label class="checkbox">
                    <?php echo $form->checkBox($model,'is_published',array('size'=>1,'maxlength'=>1)); ?> Опубликовано
                </label>
            </div>
        </div>
        <div class="span6">
            <div>
                <?php if(!$model->isNewRecord) {
                echo CHtml::image($model->thumbnail);
                echo "<br />";
                }
                ?>
                <?php echo $form->fileField($model,'thumbnail'); ?>
                <?php echo $form->error($model,'thumbnail'); ?>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="text-centered">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->