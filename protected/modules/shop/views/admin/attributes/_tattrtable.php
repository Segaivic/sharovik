<div class="row-fluid">
    <div id="attrTable<?php echo CHtml::encode($_GET['id']); ?>" class="tpos table">
        <ul id="positions">
            <?php foreach($model as $m) { ?>
            <li class="ui-state-default" id="item_<?php echo $m->id; ?>">
                <div class="item_title">
                    <?php echo $m->title; ?>, <?php echo $m->measure; ?>
                </div>
                <div class="item_type">
                    <?php if($m->type)
                        echo "Тип: ".SAttributeTitles::getTypeTitleById($m->type);
                    ?>
                </div>
                <div>
                    <?php if($m->default_value)
                        echo "По умолчанию ".$m->default_value;
                    ?>
                </div>
                <div style="float: right">
                    <?php echo CHtml::link(CHtml::image('/images/icons/remove.png','#',array('class' => 'deleteAttr','id' => 'd'.$m->id))) ; ?>
                    <?php echo CHtml::link(CHtml::image('/images/icons/edit.png'),Yii::app()->createUrl('shop/admin/attributes/updateattribute',array('id'=>$m->id))) ; ?>
                </div>
                <? } ?>
            </li>
        </ul>
    </div>
</div>