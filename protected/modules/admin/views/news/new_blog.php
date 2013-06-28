<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'blog-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($blog); ?>

    <div>
        <?php echo $form->labelEx($blog,'title'); ?>
        <?php echo $form->textField($blog,'title',array('size'=>25,'maxlength'=>255)); ?>
        <?php echo $form->error($blog,'title'); ?>
    </div>
    <div>
        <label class="checkbox">
            <?php echo $form->checkBox($blog,'is_enabled',array('size'=>1,'maxlength'=>1)); ?> Опубликовано
        </label>
    </div>
    <div>
        <label class="checkbox">
            <?php echo $form->checkBox($blog,'is_inbloglist',array('size'=>1,'maxlength'=>1)); ?> Отображать в блогах
        </label>
    </div>

    <div class="buttons">
        <?php echo CHtml::submitButton($blog->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->