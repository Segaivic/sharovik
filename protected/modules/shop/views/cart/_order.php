<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap-popover.js' , CClientScript::POS_END); ?>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'orderform',
            'enableAjaxValidation'=>false,
    )); ?>


    <table class="ordForm">
        <tr>
            <td colspan="2">
                <p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>
                <?php echo CHtml::errorSummary($model); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model , 'name'); ?>
                <?php echo $form->error($model,'name'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'email'); ?>
            </td>
            <td>
                <?php echo $form->textField($model , 'email'); ?>
                <?php echo $form->error($model,'email'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'phone'); ?>
            </td>
            <td>
                <?php echo $form->textField($model , 'phone'); ?>

                <?php echo $form->error($model,'phone'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'address'); ?>
            </td>
            <td>
                <?php echo $form->textField($model , 'address'); ?>
                <?php echo $form->error($model,'address'); ?>
            </td>
        </tr>
        <tr>
            <td class="cartlbl">
                <?php echo $form->labelEx($model, 'shipping_date'); ?>
            </td>
            <td>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'shipping_date',
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
                <?php echo $form->labelEx($model, 'comments'); ?>
            </td>
            <td>
                <?php echo $form->textArea($model , 'comments' , array('rows'=>'3' , 'cols'=>'100')); ?>
                <?php echo $form->error($model,'comments'); ?>
            </td>
        </tr>
    </table>


    <?php if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
    <?php echo CHtml::activeLabelEx($model, 'verifyCode')?>
    <?php $this->widget('CCaptcha' , array('captchaAction'=>'/site/captcha'))?>
    <?php echo CHtml::activeTextField($model, 'verifyCode')?>
    <?endif?>
      
        <div class="submit">
		<?php echo CHtml::submitButton('Оформить заказ' , array('class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->