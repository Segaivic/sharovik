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
            <td class="muted center_text"><?= CHtml::encode($position->getProductId()); ?></td>
            <td class="muted center_text">
                <?php echo CHtml::link(CHtml::image($position->getImage()),$position->getUrl()); ?>
            </td>
            <td>
                <?php echo CHtml::link($position->getTitle(),$position->getUrl())  ?>
                <br />
                <?php $options = SOptionkits::getOptions($position->id); ?>
                <?php foreach ($options as $option): ?>
                    <span style="display: block">
                        <?php if($option['withprice'] == 0){ ?>
                            <?php echo $option['group'].': '.$option['title'] ?>
                        <?php } else { ?>
                            <?php echo $option['group'].': '.$option['title'].' + '.$option['price'].' руб.'; ?>
                        <?php } ?>
                    </span>
                <?php endforeach; ?>
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
            <td><?php echo $position->getPrice(); ?></td>
            <td id="sum<?= $position->id ?>"><?= $position->getSumPrice(); ?></td>
            </tr>
                <? } ?>
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

