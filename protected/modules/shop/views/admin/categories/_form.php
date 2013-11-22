<div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'menu-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
                        'fileUpload'=>Yii::app()->createUrl('/shop/admin/index/fileUpload/attr'),
                        'fileUploadErrorCallback'=>new CJavaScriptExpression(
                            'function(obj,json) { alert(json.error); }'
                        ),
                        'imageUpload'=>Yii::app()->createUrl('/shop/admin/index/imageUpload/attr'),
                        'imageGetJson'=>Yii::app()->createUrl('/shop/admin/index/imageList',array(
                            'attr'=>$model->description
                        )),
                        'imageUploadErrorCallback'=>new CJavaScriptExpression(
                            'function(obj,json) { alert(json.error); }'),
                    ),
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'meta_description'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'meta_description'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'meta_keywords'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'meta_keywords',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'meta_keywords'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="SCategories_root">Родительский пункт</label>
            </td>
            <td>
                <?php
                if(!$model->isNewRecord) {
                    $parent=$model->parent()->find();
                    echo CHtml::dropDownList('SCategories[root]',$parent->id,SCategories::rootItems($model->id));
                }
                else {
                    echo CHtml::dropDownList('SCategories[root]','',SCategories::rootItems());
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'active'); ?>
            </td>
            <td>
                <?php echo $form->checkBox($model,'active',array('size'=>1,'maxlength'=>1)); ?>
                <?php echo $form->error($model,'active'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'alias_url'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'alias_url',array('size'=>60,'maxlength'=>200)); ?>
                <?php echo $form->error($model,'alias_url'); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <div>
        <?php if(!$model->isNewRecord) {
        echo CHtml::image($model->thumbnail);
        echo "<br />";
    }
        ?>
        <?php echo $form->fileField($model,'thumbnail'); ?>
        <?php echo $form->error($model,'thumbnail'); ?>
    </div>
<div class="buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->