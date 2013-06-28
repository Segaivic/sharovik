<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'gallery-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
)); ?>
    <?php
        echo $form->hiddenField($model,'product_id');
    ?>

    <?php
        $form->widget('CMultiFileUpload', array(
            'name' => 'images',
            'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
            'duplicate' => 'Дублирование изображения!', // useful, i think
            'denied' => 'Этот тип файла запрещён', // useful, i think
        ));
    ?>

<div class="buttons">
    <?php echo CHtml::submitButton('Добавить'); ?>
</div>

<?php $this->endWidget(); ?>