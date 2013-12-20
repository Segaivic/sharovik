<?php
$this->pageTitle = $mod->title;

//breadcrumbs

    $this->breadcrumbs = array(
        'Администрирование' => '/admin',
        'Каталог' => '/shop/admin',
        'Товары' => '/shop/admin/product',
        $mod->product->title => $mod->product->url,
        'Опции' => '/shop/admin/adds/index/id/'.$mod->product->id,
        $mod->title
     );
?>

<h1><?php echo $mod->title; ?></h1>
<?php if (empty($model)) { ?>
    <p>Здесь пока ничего не добавлено</p>
<?php } else { ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Заголовок
                </th>
                <?php if($mod->withprice == ShopAddsGroups::STATUS_ACTIVE): ?>
                    <th>
                        Цена, руб.
                    </th>
                <?php endif ?>
                <?php if($mod->withstock == ShopAddsGroups::STATUS_ACTIVE): ?>
                <th>
                    Кол-во на складе
                </th>
                <?php endif ?>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
        <?php echo CHtml::beginForm(); ?>
            <?php foreach($model as $m): ?>
                <tr>
                    <td>
                        <?php echo CHtml::telField('item['.$m->id.'][title]', $m->title);  ?>
                    </td>
                    <?php if($mod->withprice == ShopAddsGroups::STATUS_ACTIVE): ?>
                        <td>
                            <?php echo CHtml::telField('item['.$m->id.'][price]', $m->price);  ?>                        </td>
                    <?php endif ?>
                    <?php if($mod->withstock == ShopAddsGroups::STATUS_ACTIVE): ?>
                    <td>
                        <?php echo CHtml::telField('item['.$m->id.'][in_stock]', $m->in_stock);  ?>
                    </td>
                    <?php endif ?>
                    <td>
                       <?php echo CHtml::ajaxLink('Удалить', Yii::app()->createUrl('/shop/admin/adds/delete'),
                            array(
                                'type' => 'post',
                                'data' => array('id' => $m->id),
                                'beforeSend' => 'function(){$(this).parent().parent().addClass("loading")}',
                                'success' => '$(this).parent().parent().remove()'
                            )
                        );?>
                    </td>
                </tr>
            <?php endforeach ?>
                <tr>
                    <td colspan="4"><?php echo CHtml::submitButton('Сохранить', array('class' => 'btn blue')); ?></td>
                </tr>
        <?php echo CHtml::endForm(); ?>
        </tbody>
    </table>
<?php } ?>
<div style="height: 30px"></div>
<?php $this->renderPartial('_formItem' , array('model' => $item , 'withprice' => $mod->withprice , 'withstock' => $mod->withstock)); ?>