<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'products-form',
        'method' => 'post',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Поля, отмеченные <span class="required">*</span> Обязательны для заполнения.</p>
    <?php echo $form->errorSummary($attr); ?>
    <table class="width-100 striped" id="positions">
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td><?php echo $form->labelEx($attr,'title'); ?></td>
            <td>
                <?php echo $form->textField($attr,'title',array('size'=>60,'maxlength'=>300)); ?>
                <br />
                <?php echo $form->error($attr,'title'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($attr,'measure'); ?></td>
            <td> <?php echo $form->textField($attr,'measure',array('size'=>10,'maxlength'=>20)); ?>
                <br />
                <?php echo $form->error($attr,'measure'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($attr,'type'); ?></td>
            <td> <?php echo $form->dropDownList($attr, 'type', array(

                    SAttributeTitles::TEXTFIELD => 'Текстовое поле',
                    SAttributeTitles::DIGITALFIELD => 'Числовое значение',
                    SAttributeTitles::BOOLEANFIELD => 'Да/Нет (1/0)',

                )); ?>
                <br />
                <?php echo $form->error($attr,'type'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($attr,'default_value'); ?></td>
            <td><?php echo $form->textField($attr,'default_value',array('maxlength'=>255)); ?>
                <br />
                <?php echo $form->error($attr,'default_value'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($attr,'in_search'); ?></td>
            <td><?php echo $form->checkBox($attr,'in_search'); ?>
                <br />
                <?php echo $form->error($attr,'in_search'); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <br />
    <div>
        <?php echo CHtml::submitButton($attr->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn blue')); ?>
    </div>

    <?php $this->endWidget(); ?>


</div><!-- form -->