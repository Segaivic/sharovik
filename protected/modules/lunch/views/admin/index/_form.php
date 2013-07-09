<div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'lunchproducts-form',
    'enableAjaxValidation'=>false,
)); ?>
<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>
<?php echo $form->errorSummary($model); ?>
    <table class="table">
        <tbody>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'title'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'title'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo $form->labelEx($model,'description'); ?>
                <?php echo $form->textarea($model,'description',array('cols'=>80,'rows'=>5,'style'=>'width:99%')); ?>
                <?php echo $form->error($model,'description'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'weight'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'weight',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'weight'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'price'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'price'); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->