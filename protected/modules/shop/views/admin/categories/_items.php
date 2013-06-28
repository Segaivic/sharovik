<?php Yii::app()->clientScript->registerScriptFile('/js/shop.js' , CClientScript::POS_END); ?>
<table class="table" id='positions'>
    <thead>
    <tr>
        <th>Заголовок</th>
        <th>Опубликовано</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($model as $m): ?>
    <tr>
        <td><?php echo CHtml::link(CHtml::encode($m->title),array('/shop/admin/categories/update/','id'=>$m->id)); ?></td>
        <td><?php echo CHtml::encode(CConvertValues::convBool($m->active)); ?></td>
        <td style="min-width: 50px;">

            <?php
                if(SCategories::checkNeighborNode($m->id , 'prev') === true) {
                    echo CHtml::link(CHtml::image('/images/icons/up.png'),'#',array('id'=>'shop_up'.$m->id , 'class'=>'shop_up'));
                }

                if(SCategories::checkNeighborNode($m->id , 'next') === true) {
                    echo CHtml::link(CHtml::image('/images/icons/down.png'),'#',array('id'=>'shop_down'.$m->id , 'class'=>'shop_down'));
                }

                ?>
        </td>

        <td style="min-width: 50px;"><?php echo CHtml::link(CHtml::image('/images/icons/delete16x16.png'),array('/shop/admin/categories/delete','id'=>$m->id),array('confirm' => 'Уверены, что хотите удалить?')); ?></td>
        <td><?php echo CHtml::link('Характеристики',array('/shop/admin/attributes/titles','id'=>$m->id)) ?></td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
