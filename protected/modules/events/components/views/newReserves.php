<li class="dropdown" id="header_task_bar">
    <a href="/events/admin/reserve/index" class="dropdown-toggle" title="Новых заявок: <?php echo count($model) ?>">
        <i class="icon-glass"></i>
        <span class="badge"><?php if(count($model) !== null) {echo CHtml::encode(count($model));} ?></span>
    </a>
</li>