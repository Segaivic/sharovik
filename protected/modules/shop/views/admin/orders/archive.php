<?php
$this->pageTitle = 'Заказ - '.Yii::app()->name;
$this->breadcrumbs = array(
    'Заказы' => '/shop/admin',
    'Архив заказов'
);
?>

<div class="row-fluid">
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'orders-grid',
    'dataProvider' =>  $model->archive(),
    'filter' => $model,
    'columns'=>array(
        array(
            'class'=>'CButtonColumn',
            'template'=>'{order}',
            'buttons'=> array(
                'order' => array
                (
                    'label'=>'Перейти к заказу',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/order.png',
                    'url'=>'Yii::app()->createUrl("/shop/admin/orders/details", array("id"=>$data->id))',
                ),
            ),
        ),
        array (
            'class'=>'DataColumn',
            'name' => 'id',
            'value' => '$data->id',
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('class'=>'"visited_{$data->visited}"'),
        ),
        array (
            'class'=>'DataColumn',
            'name' => 'created',
            'value' => 'Yii::app()->dateFormatter->format("dd MMMM y, HH:mm", $data->created)',
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('class'=>'"visited_{$data->visited}"'),
        ),

        array (
            'class'=>'DataColumn',
            'name' => 'name',
            'value' => '$data->name',
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('class'=>'"visited_{$data->visited}"'),
        ),
        array (
            'header' => 'Сумма',
            'value' => 'SOrderItems::getSum($data->id)',
            'htmlOptions'=>array('class'=>'"visited_{$data->visited}"'),
        ),

    )

));
?>
    </div>
</div>