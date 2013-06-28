<div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'menu-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<!--Фильтр для числовых полей-->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.numberMask.js' , CClientScript::POS_END);
    Yii::app()->clientScript->registerScript("d_field_filter","
$('#SProducts_in_stock').numberMask({beforePoint:4});
", CClientScript::POS_END);
    ?>
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
            <td>
                <?php echo $form->labelEx($model,'description'); ?>
            </td>
            <td>
                <?php echo $form->textArea($model,'description',array('cols'=>70,'rows'=>10,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'description'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">

                    <?php echo $form->labelEx($model,'characters'); ?>
                    <?php
                    $this->widget('ext.redactor.ERedactorWidget',array(
                        'model'=>$model,
                        'attribute'=>'characters',
                        'options'=>array(
                            'allowedTags' => Yii::app()->params['redactor']['allowedTags'],
                            'convertDivs' => Yii::app()->params['redactor']['convertDivs'],
                            'lang'=>'ru',
                            'fileUpload'=>Yii::app()->createUrl('/shop/admin/index/fileUpload/attr'),
                            'fileUploadErrorCallback'=>new CJavaScriptExpression(
                                'function(obj,json) { alert(json.error); }'
                            ),
                            'imageUpload'=>Yii::app()->createUrl('/shop/admin/index/imageUpload/attr'),
                            'imageGetJson'=>Yii::app()->createUrl('/shop/admin/index/imageList/attr'),
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
                <label for="SProduct_root">Категория</label>
            </td>
            <td>
                <?php echo CHtml::dropDownList('SProducts[category_id]',$model->category_id,CHtml::listData(SCategories::model()->findAll(), 'id', 'title')); ?>
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
                <?php echo $form->labelEx($model,'price'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'price'); ?>
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
        <tr>
            <td>
                <?php echo $form->labelEx($model,'in_stock'); ?>
            </td>
            <td>
                <?php echo $form->textField($model,'in_stock',array('size'=>60,'maxlength'=>200)); ?>
                <?php echo $form->error($model,'in_stock'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($image,'image'); ?>
            </td>
            <td>
                <?php if(!$image->isNewRecord){
                    echo CHtml::image($image->thumbnail);
                } ?>
                <?php echo $form->fileField($image,'image'); ?>
                <?php echo $form->error($image,'image'); ?>
            </td>
        </tr>
        </tbody>
    </table>
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->