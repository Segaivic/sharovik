<?php
$this->breadcrumbs = array(
    'События' => '/events/admin/index',
    'Заявки' => '/events/admin/reserve/index',
    'Заявка на '.$model->date_start
);
?>
<h2>Заявка на <?php echo Yii::app()->dateFormatter->format("dd MMMM y", $model->date_start) ?> г.
    <div class="btn-group">
        <a class="btn blue" href="#" data-toggle="dropdown">
            <i class="icon-user"></i> Действия
            <i class="icon-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="/events/admin/index/create"><i class="icon-plus"></i> Оформить</a></li>
            <li><?php echo CHtml::link('<i class="icon-remove"></i> Удалить',Yii::app()->createUrl('/events/admin/reserve/delete',array('id' => $model->id)),
                array('submit'=>array('/events/admin/reserve/delete', 'id' => $model->id),
                'confirm' => 'Вы уверены?')); ?></li>
            <li class="divider"></li>
            <li><a href="/events/admin/reserve/index"><i class="i"></i> Все заявки</a></li>
        </ul>
    </div>
</h2>

    <table class="table table-striped">
        <tbody>
            <tr>
                <td style="width: 20%;">
                    Имя заказчика:
                </td>
                <td>
                    <?php echo CHtml::encode($model->name); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Контактная информация:
                </td>
                <td>
                    <?php echo CHtml::encode($model->contacts); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Дата заказа:
                </td>
                <td>
                    <?php if($model->date_start == $model->date_end){ ?>
                    <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_start) ?>
                    <?php } else { ?>
                        С <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_start) ?> по <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_end); ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Информация о заявке:
                </td>
                <td>
                    <?php echo CHtml::encode($model->description); ?>
                </td>
            </tr>
            <tr>
        </tbody>
    </table>
