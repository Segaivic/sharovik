<?php if(!empty($model)): ?>
    <?php foreach($model as $m): ?>
            <h5><?php echo $m->title ?></h5>
                <?php if($m->multichoice == ShopAddsGroups::STATUS_ACTIVE): ?>
                    <table>
                        <tbody>
                        <?php foreach($m->shopAddsItems as $item): ?>
                            <tr>
                                <td>
                                    <span><input name="options[]" value="<?php echo $item->id; ?>" type="checkbox" /></span>
                                </td>
                                <td class="options_desc">
                                    <?php echo $item->title ?><?php echo $m->withprice == ShopAddsGroups::STATUS_ACTIVE ? ' + '.$item->price.' руб' : '' ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif; ?>

<!--                для одинарнаго выбора-->
                <?php if($m->multichoice == ShopAddsGroups::STATUS_DISABLED): ?>
                        <select style="width: 90% !important;" name="options[]">
                            <option value="0">---Выберите---</option>
                            <?php foreach($m->shopAddsItems as $item): ?>
                                <option value="<?php echo $item->id; ?>"><?php echo $item->title ?><?php echo $m->withprice == ShopAddsGroups::STATUS_ACTIVE ? ' + '.$item->price.' руб' : '' ?></option>
                            <?php endforeach ?>
                        </select>
                <?php endif; ?>
    <?php endforeach ?>
<?php endif; ?>
<br />