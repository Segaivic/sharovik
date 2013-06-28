<div id="dragAndDropFiles" class="uploadArea">
    <h1>Перенесите файлы сюда</h1>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>
	<?php echo $form->errorSummary($model); ?>
        <div>
            <input type="file" name="multiUpload" id="multiUpload" multiple="multiple" />
            <div class="progressBar"></div>
            <div class="status"></div>
        </div>
        <?php echo $form->hiddenField($model,'gallery_id' , array('value' => $gallery->id)); ?>
        <div>
            <div class="half centered">
                <div class="text-centered">
                    <?php echo CHtml::submitButton('Загрузить' , array('id' => 'upl')); ?>
                </div>
            </div>
        </div>

<?php $this->endWidget(); ?>
</div><!-- form -->