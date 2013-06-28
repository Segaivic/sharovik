<?php
$this->pageTitle = 'Каталог - '.Yii::app()->name;
$this->breadcrumbs = array(
  'Панель управления' => '/admin',
  'Каталог'
);

$this->header = "Заказы";
?>

<!--flash message about deleted order-->
<?php if(Yii::app()->user->hasFlash('order_success_deleted')): ?>
<div class="success">
    <?php echo Yii::app()->user->getFlash('order_success_deleted'); ?>
</div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <div class = "orderstable">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'orders-grid',
                'dataProvider' =>  $model->search(SOrders::STATUS_ACTIVE),
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
</div>

