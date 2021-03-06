<table class="table table-bordered table-striped">
    <thead>
    <tr>
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
               <?php echo $position->quantity; ?>
            </td>
            <td><?php echo $position->getPrice(); ?></td>
            <td id="sum<?= $position->id ?>"><?= $position->getSumPrice(); ?></td>
        </tr>
    <? } ?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span style="display: none" id="itemscount"><?php echo Yii::app()->shoppingCart->getItemsCount(); ?></span></td>
    <td colspan="2">Общая сумма заказа:</td>
    <td><strong id="total"><?= Yii::app()->shoppingCart->getCost(); ?></strong></td>
    </tr>
    </tbody>
</table>