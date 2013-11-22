<?php
$this->pageTitle = 'Заказ - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Заказы' => '/shop/admin',
    'Заказ № '.$model->id,
);
$this->header = "Заказ № &laquo; ".CHtml::encode($model->id)." &raquo; от ".Yii::app()->dateFormatter->format("dd MMMM y, HH:mm", $model->created);
?>

<div class="row-fluid">
    <table class="table">
        <tr>
            <td>
                Заказчик:
            </td>
            <td>
                <? if($model->user_id !== null) {
                echo CHtml::link(CHtml::encode($model->name),array('/user/admin/view/','id' => $model->user_id));
            }
            else {
                echo CHtml::encode($model->name);
            }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                Адрес:
            </td>
            <td>
                <?php echo CHtml::encode($model->address); ?>
            </td>
        </tr>
        <?php if (!$model->comments == null) { ?>
        <tr>
            <td>
                Комментарии к заказу:
            </td>
            <td>
                <?php echo CHtml::encode($model->comments); ?>
            </td>
        </tr>
        <?php } ?>
        <?php if (!$model->email == null) { ?>
        <tr>
            <td>
                Электропочта:
            </td>
            <td>
                <?php echo CHtml::encode($model->email); ?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h3>Товары:</h3>
    <?php $this->renderPartial('_items', array ('model' => $model->items)); ?>

    <h3>Действия</h3>
    <br />
    <p>
        <?php switch ($model->active) {
        case 1:
            echo CHtml::link('Закрыть заказ',"#", array("submit"=>array('/shop/admin/orders/closeorder/', 'id'=>$model->id), 'confirm' => 'Уверены, что закрыть текущий заказ?'));
            break;
        case 0:
            echo CHtml::link('Открыть заказ',"#", array("submit"=>array('/shop/admin/orders/openorder/', 'id'=>$model->id), 'confirm' => 'Уверены, что открыть текущий заказ?'));
            break;

    } ?>

    </p>
    <p>
        <?php echo CHtml::link('Удалить заказ' , "#", array("submit"=>array('/shop/admin/orders/deleteorder/', 'id'=>$model->id), 'confirm' => 'Уверены, что удалить текущий заказ?')); ?>
    </p>
    <p>
        <?php echo CHtml::link('Назад к списку заказов' , '/shop/admin/'); ?>
    </p>
</div>