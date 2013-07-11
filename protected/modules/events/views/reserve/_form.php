<div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'events-form',
    'enableAjaxValidation'=>false,
)); ?>
<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>
<?php echo $form->errorSummary($model); ?>
    <table class="table">
        <tbody>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'name'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'contacts'); ?>
            </td>
            <td>
                <?php echo $form->textarea($model,'contacts',array('cols'=>80,'rows'=>5,'style'=>'width:99%')); ?>
                <?php echo $form->error($model,'contacts'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'description'); ?>
            </td>
            <td>
                <?php echo $form->textarea($model,'description',array('cols'=>80,'rows'=>5,'style'=>'width:99%')); ?>
                <?php echo $form->error($model,'description'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'date_start'); ?>
            </td>
            <td>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'date_start',
                    'language' => 'ru',
                    'options' => array(
                        'showAnim' => 'fold',
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:20px;'
                    ),
                ));?>
                <?php echo $form->error($model,'date_start'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'date_end'); ?>
            </td>
            <td>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'date_end',
                    'language' => 'ru',
                    'options' => array(
                        'showAnim' => 'fold',
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:20px;'
                    ),
                ));?>
                <?php echo $form->error($model,'date_start'); ?>
            </td>
        </tr>
        <?php if($model->isNewRecord): ?>
            <tr>
                <?if(CCaptcha::checkRequirements()):?>
                <td>
                    <?=CHtml::activeLabelEx($model, 'verifyCode')?>
                </td>
                <td>
                    <?$this->widget('CCaptcha')?>
                    <?=CHtml::activeTextField($model, 'verifyCode')?>
                </td>
                <?endif?>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<div class="buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Заказать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>
    <?php Yii::app()->clientScript->registerCssFile('/backend/assets/bootstrap-colorpicker/css/colorpicker.css', CClientScript::POS_HEAD); ?>
    <?php Yii::app()->clientScript->registerScriptFile('/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js', CClientScript::POS_END); ?>

</div><!-- form -->