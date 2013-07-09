<li class="dropdown" id="header_task_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-tasks"></i>
        <span class="badge"><?php if(count($model) !== null) {echo CHtml::encode(count($model));} ?></span>
    </a>
    <ul class="dropdown-menu extended tasks">
        <li>
            <p>Новых заказов: <?php if(count($model) !== null) {echo CHtml::encode(count($model));} ?></p>
        </li>
        <?php foreach($model as $m):
          $bar = SOrders::getBarWidth(SOrderItems::getSum($m->id));
            ?>
        <li>
            <a href="<?php echo Yii::app()->createUrl('/shop/admin/orders/details/',array('id' => $m->id)); ?>">
								<span class="task">
								<span class="desc"><?php echo SOrderItems::getSum($m->id); ?> руб.</span>
								<span class="percent"></span>
								</span>
								<span class="progress <?php echo CHtml::encode($bar['class']); ?> ">
								<span style="width: <?php echo CHtml::encode($bar['price']); ?>%;" class="bar"></span>
								</span>
            </a>
        </li>
        <?php endforeach; ?>
        <li class="external">
            <a href="/shop/admin/">Все заказы <i class="m-icon-swapright"></i></a>
        </li>
    </ul>
</li>