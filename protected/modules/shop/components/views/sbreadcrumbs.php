<ul class="breadcrumb">
    <li>
       <a href="/">Главная</a>
        <span class="divider">/</span>
    </li>
    <?php foreach($items as $item): ?>
    <li>
        <?php echo CHtml::link($item['label'],$item['url']);?>
        <span class="divider">/</span>
    </li>
    <?php endforeach; ?>
    <li>
        <?php echo  CHtml::link(CHtml::encode($model->title), $model->url); ?>
        <span class="divider">/</span>
    </li>
</ul>