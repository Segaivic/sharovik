<div class="portlet box blue">
    <div class="portlet-title">
        <h4><i class="icon-reorder"></i><?php echo $model->isNewRecord ? 'Добавить' : 'Изменить' ?> опцию</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'addGroup-form',
            'method' => 'post',
            'enableAjaxValidation'=>false,
         )); ?>
        <p class="note">Поля, отмеченные <span class="required">*</span> Обязательны для заполнения.</p>
        <?php echo $form->errorSummary($model); ?>
        <table class="table" id="positions">
            <tbody>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'title'); ?>
                </td>
                <td>
                    <?php echo $form->textField($model,'title',array('maxlength'=>200)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'active'); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model,'active'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'withprice'); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model,'withprice'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'multichoice'); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model,'multichoice'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'withstock'); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model,'withstock'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class' => 'btn blue')); ?>
                </td>
            </tr>
            </tbody>
        </table>
        <?php $this->endWidget(); ?>
    </div>
</div>
