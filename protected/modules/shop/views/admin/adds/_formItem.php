<div class="portlet box blue">
    <div class="portlet-title">
        <h4><i class="icon-reorder"></i><?php echo $model->isNewRecord ? 'Добавить' : 'Изменить' ?> вариант</h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'addItem-form',
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
            <?php if($withprice == ShopAddsItems::STATUS_ACTIVE): ?>
            <tr>
                <td>
                    <?php echo $form->labelEx($model,'price'); ?>
                </td>
                <td>
                    <?php echo $form->textField($model,'price',array('maxlength'=>200)); ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php if($withstock == ShopAddsItems::STATUS_ACTIVE): ?>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model,'in_stock'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model,'in_stock',array('maxlength'=>10)); ?>
                    </td>
                </tr>
            <tr>
            <?php endif; ?>
                <td colspan="2">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', array('class' => 'btn blue')); ?>
                </td>
            </tr>
            </tbody>
        </table>
        <?php $this->endWidget(); ?>
    </div>
</div>
