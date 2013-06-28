<div class="goods_menu">
    <div class="shopmenu_inner">
        <ul class="goods">
            <?php foreach($model as $m): ?>
                <li><?php echo CHtml::link(CHtml::encode($m->title),$m->url); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
