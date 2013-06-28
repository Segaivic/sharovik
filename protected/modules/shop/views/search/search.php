
<?php
$this->pageTitle='Результаты поиска -' .Yii::app()->name;
$this->breadcrumbs=array(
    'Результаты поиска по запросу: '. CHtml::encode($term),
);
?>

<h3>Результаты поиска по запросу: "<?php echo CHtml::encode($term); ?>"</h3>
<?php if (!empty($results)): ?>
    <?php foreach($results as $result):
        ?>
        <h2>
            <?php echo CHtml::link($result->category, CHtml::encode($result->categorylink),array('class' => 'categorylink')); ?> :
            <?php echo CHtml::link($result->title, CHtml::encode($result->link)); ?>
        </h2>
        <div class="row">
            <div class="span2">
                <?php echo CHtml::image($result->thumbnail ? $result->thumbnail : Yii::app()->params->nophoto); ?>
            </div>
            <div class="span10">
                <p>
                    <?php echo $result->content; ?></p>
            </div>
        </div>
        <hr class="clear"/>
    <?php endforeach; ?>

<?php else: ?>
    <p class="error">Поиск не дал результатов.</p>
<?php endif; ?>