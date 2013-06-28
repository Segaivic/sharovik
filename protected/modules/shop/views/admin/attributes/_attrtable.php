<?php foreach($allAttributes as $attr): ?>
    <?php if(SAttrs::checkAttributes($pid, $attr->id) === false): ?>
    <?php echo CHtml::beginForm(); ?>
    <table class="table">
        <tr>
            <td width="20%">
                <?php echo CHtml::encode($attr->title).' <br />(<span class="typedesc">'.Chtml::encode(SAttributeTitles::getTypeTitleById($attr->type)).'</span>)'; ?>
            </td width="60%">
            <td>
                <?php
                switch ($attr->type) {
                    case SAttributeTitles::DIGITALFIELD :

                        $this->beginWidget('zii.widgets.jui.CJuiAutoComplete', array(
                            'id' => 'autocomplete'.$attr->id,
                            'name'=>'availableAttr[attr_valueid]',
                            'value' => $attr->default_value,
                            'source'=>Yii::app()->createUrl('/shopadmin/autocomplete' , array('attr_id' => $attr->id)),
                            // additional javascript options for the autocomplete plugin
                            'options'=>array(
                                'minLength'=>'2',
                            ),
                            'htmlOptions'=>array(
                                'style'=>'height:20px;',
                                'class' => 'digitalfield',
                            ),
                        ));
                        $this->endWidget();

//                                echo CHtml::textField('availableAttr[attr_value]',$attr->default_value);
                        break;

                    case SAttributeTitles::TEXTFIELD :

                        $this->beginWidget('zii.widgets.jui.CJuiAutoComplete', array(
                            'id' => 'autocomplete'.$attr->id,
                            'name'=>'availableAttr[attr_valueid]',
                            'value' => $attr->default_value,
                            'source'=>Yii::app()->createUrl('/shopadmin/autocomplete' , array('attr_id' => $attr->id)),
                            // additional javascript options for the autocomplete plugin
                            'options'=>array(
                                'minLength'=>'2',
                            ),
                            'htmlOptions'=>array(
                                'style'=>'height:20px;'
                            ),
                        ));
                        $this->endWidget();

                        break;

                    case SAttributeTitles::BOOLEANFIELD :
                        echo CHtml::checkBox('availableAttr[attr_valueid]',$attr->default_value,array('uncheckValue' => 0));
                        break;
                }

                ?>
                <?php echo CHtml::hiddenField('availableAttr[attribute_id])', $attr->id); ?>
            </td>
            <td width="20%">
                <?php echo CHtml::submitButton('Добавить'); ?>
            </td>
        </tr>
    </table>

    <div style="clear:both"></div>
    <?php echo CHtml::endForm(); ?>
    <?php endif; ?>
<?php endforeach; ?>