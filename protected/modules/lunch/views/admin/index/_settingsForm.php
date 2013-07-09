<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lunch-form',
	'enableAjaxValidation'=>false,
)); ?>
    <div class="row-fluid">
        <div class="span12">
            <div>
                <?php echo $form->labelEx($settings,'description'); ?>
                <?php echo $form->textarea($settings,'description',array('cols'=>80,'rows'=>5,'style'=>'width:99%')); ?>
                <?php echo $form->error($settings,'description'); ?>
            </div>
        </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="text-centered">
                <?php echo CHtml::submitButton($settings->isNewRecord ? 'Создать' : 'Сохранить'); ?>
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->