<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($model); ?>
    <table class="table">
        <?php foreach($model as $key=>$value) { ?>
            <tr>
            <td>
            <?php if (isset($value->attrTitles->title)) {
                echo CHtml::encode($value->attrTitles->title);  ?>
                </td>
                <td>
                    <?php
                    switch ($value->attrTitles->type) {
                        case SAttributeTitles::DIGITALFIELD :
                            echo CHtml::textField('Attr['.$key.'][attr_valueid]',$value->attrValues->value , array('class' => 'digitalfield'));
                            break;

                        case SAttributeTitles::TEXTFIELD :

                            echo CHtml::textField('Attr['.$key.'][attr_valueid]',$value->attrValues->value);
                            break;

                        case SAttributeTitles::BOOLEANFIELD :
                            echo CHtml::checkBox('Attr['.$key.'][attr_valueid]',$value->attrValues->value,array('uncheckValue' => 0));
                            break;
                    }
                    ?>
                </td>
                <td>
                    <?php echo CHtml::link(
                        CHtml::image('/images/icons/remove.png'),
                        array('/shop/admin/attributes/deleteattr/','id' => $value->id)); ?>
                </td>
                </tr>
            <?php  } //endif
        } ?>

    </table>
    <?php echo CHtml::submitButton('Сохранить') ?>
    <div style="clear:both"></div>
    <?php echo CHtml::endForm(); ?>
</div><!-- form -->

