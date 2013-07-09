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
                <?php echo $form->labelEx($model,'title'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'title'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">

                    <?php echo $form->labelEx($model,'description'); ?>
                    <?php
                    $this->widget('ext.redactor.ERedactorWidget',array(
                        'model'=>$model,
                        'attribute'=>'description',
                        'options'=>array(
                            'allowedTags' => Yii::app()->params['redactor']['allowedTags'],
                            'convertDivs' => Yii::app()->params['redactor']['convertDivs'],
                            'lang'=>'ru',
                            'fileUpload'=>Yii::app()->createUrl('events/admin/index/fileUpload/attr'),
                            'fileUploadErrorCallback'=>new CJavaScriptExpression(
                                'function(obj,json) { alert(json.error); }'
                            ),
                            'imageUpload'=>Yii::app()->createUrl('events/admin/index/imageUpload/attr'),
                            'imageGetJson'=>Yii::app()->createUrl('events/admin/index/imageList/attr'),
                            'imageUploadErrorCallback'=>new CJavaScriptExpression(
                                'function(obj,json) { alert(json.error); }'),
                        ),
                    ));
                    ?>
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
                <?php echo $form->error($model,'shipping_date'); ?>
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
                <?php echo $form->error($model,'shipping_date'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'color'); ?>
            </td>
            <td>
                <div class="input-append color colorpicker-default" data-color="<?php echo $model->color ? $model->color : '#3865a8'; ?>" data-color-format="rgba">
                    <?php echo $form->textField($model,'color',array('class'=>'m-wrap','readonly'=>'')); ?>
                    <span class="add-on"><i style="background-color: <?php echo $model->color ? $model->color : '#3865a8'; ?>"></i></span>
                </div>
                <?php echo $form->error($model,'color'); ?>
            </td>
        </tr>
        </tbody>
    </table>
<div class="buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>
    <?php Yii::app()->clientScript->registerCssFile('/backend/assets/bootstrap-colorpicker/css/colorpicker.css', CClientScript::POS_HEAD); ?>
    <?php Yii::app()->clientScript->registerScriptFile('/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js', CClientScript::POS_END); ?>

</div><!-- form -->