<?php
    Yii::app()->clientScript->registerScriptFile('/js/cart.js' , CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/jquery.numberMask.js' , CClientScript::POS_HEAD);

?>
<div id="carttable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Код</th>
                <th></th>
                <th>Наименование</th>
                <th>Наличие на складе</th>
                <th>Количество</th>
                <th>Цена, руб.</th>
                <th>Сумма,руб.</th>
            </tr>
        </thead>
        <tbody>
            <? foreach (Yii::app()->shoppingCart->getPositions() as $position) {
                ?>         
                <tr>
                    <td style="vertical-align: middle;">

                <?php echo
                CHtml::ajaxLink(
                    CHtml::image('/images/icons/delete16x16.png'), CController::createUrl('/shop/cart/DeleteItemFromCartById'),
                    array('type' => 'POST',
                    'data' => array('id' => $position->id),
                    'update' => '#carttable',
                    'beforeSend' => 'function(){
                                  $("#carttable").addClass("loading");
                                  }',
                    'complete' => 'function(response){
                                  $("#carttable").removeClass("loading");
                                  }',
                        ),
                    array('id' => 'deleteItem' . $position->id,
                    'title' => 'Удалить')
                );
                ?>
            </td>
            <td class="muted center_text"><?= CHtml::encode($position->id); ?></td>
            <td class="muted center_text"><?= CHtml::link(CHtml::image($position->image->thumbnail),$position->url); ?></td>
            <td><?= CHtml::link($position->title, $position->url)  ?></td>
            <td class="muted center_text">
                <?php if($position->in_stock > 0){?>
                    <span>в наличии не более <?php echo $position->in_stock ?> позиций</span>
                <?php } else { ?>
                    <span>на заказ</span>
                <?php } ?>

            </td>
            <td class="quantity-cell">
               <center> 
                <div class="quantity-change-icon"><a href="javascript:" class="q-minus" id="quantity-minus<?= $position->id ?>"><i class="icon-minus-sign"></i></a></div>
                <div class="quantity-text">
                    <input type="text" placeholder="1" id="quantity<?= $position->id ?>" class="quantity" value="<?= $position->quantity ?>" class="input-mini">
                </div>
                <div class ="quantity-change-icon"><a href="javascript:" class="q-plus" id="quantity-plus<?= $position->id ?>"><i class="icon-plus-sign"></i></a></div>
               </center>
            </td>
            <td><?= $position->getPrice(); ?></td>
            <td id="sum<?= $position->id ?>"><?= $position->getSumPrice(); ?></td>
            </tr>
                <? } ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><span style="display: none" id="itemscount"><?php echo Yii::app()->shoppingCart->getItemsCount(); ?></span></td>
        <td colspan="2">Общая сумма заказа:</td>
        <td><strong id="total"><?= Yii::app()->shoppingCart->getCost(); ?></strong></td>
        </tr>		  
        </tbody>
    </table>
</div>

