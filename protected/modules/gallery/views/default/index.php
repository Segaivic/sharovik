<?php
$this->pageTitle = 'Галерея - '.Yii::app()->name;
$this->breadcrumbs=array(
	'Галерея',
);
?>
<h1>Галерея</h1>
<div class="row">
<?php foreach($model as $m): ?>
  <div class="gallery_item">
    <div class="gallery_image">
        <?php echo CHtml::link(CHtml::image($m->thumbnail),$m->url); ?>
    </div>
    <div class="gallery_title">
        <?php echo CHtml::link($m->title,$m->url); ?><br/>
        <span class="gallery_created">
            <?php echo  Yii::app()->dateFormatter->format("dd MMMM y", $m->created); ?>
        </span>
    </div>
  </div>
<?php endforeach; ?>
</div>
