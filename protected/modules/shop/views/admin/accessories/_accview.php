
<ul class="goods">
<?  foreach ($accessories as $accessory) { ?>

    <li>
        <div class="accgoods" id="accgoods<?php echo $accessory['u_id']; ?>">
            <div class="productimg">
                <a href="/shop/product/<?php echo $accessory['product_id']; ?>">
                    <?php echo CHtml::image($accessory['thumbnail']) ?></a>
            </div>

            <div class="acctitle">
                <a href="/shop/product/<?= $accessory['product_id']; ?>"><?php echo $accessory['title']; ?></a>
            </div>

            <div class="accproductprice">
                <span class="priceval"><?php echo CHtml::encode($accessory['price']); ?> </span>
                <span class="rur">p<span>уб.</span></span>
            </div>

            <div>
                <?  echo
                    CHtml::Link('Удалить','javascript:', array('id' => 'delacc'));
                ?>
            </div>
        </div>
    <li>
     <?php }  ?>
</ul>
<!--acclist-->