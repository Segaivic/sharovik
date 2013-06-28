<?php Yii::app()->clientScript->registerScriptFile('/js/menu.js' , CClientScript::POS_END); ?>
<table class="table" id='positions'>
    <thead>
    <tr>
        <th>Заголовок</th>
        <th>Ссылка</th>
        <th>Доступ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($model as $m): ?>

    <tr>
        <td><?php echo CHtml::link(CHtml::encode($m->title),array('/admin/menu/update/','id'=>$m->id)); ?></td>
        <td><?php echo CHtml::encode($m->link); ?></td>
        <td><?php Menu::getMenuValues($m->access); ?></td>
        <td>

            <?php
                if(Menu::checkNeighborNode($m->id , 'prev') === true) {
                    echo CHtml::link(CHtml::image('/images/icons/up.png'),'#',array('id'=>'up'.$m->id , 'class'=>'up'));
                }

                if(Menu::checkNeighborNode($m->id , 'next') === true) {
                    echo CHtml::link(CHtml::image('/images/icons/down.png'),'#',array('id'=>'down'.$m->id , 'class'=>'down'));
                }

                ?>
        </td>

        <td><?php echo CHtml::link(CHtml::image('/images/icons/delete16x16.png'),array('/admin/menu/delete','id'=>$m->id),array('confirm' => 'Уверены, что хотите удалить?')); ?></td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
