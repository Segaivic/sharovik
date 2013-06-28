<?php
$this->pageTitle = $model->title.' - '.Yii::app()->name;
$this->breadcrumbs=array(
    'Галерея' => '/gallery',
    $model->title
);
?>
<h1>
    <?php echo CHtml::encode($model->title); ?>
    <?php if (Yii::app()->getModule('user')->isAdmin()) {
    echo CHtml::link(CHtml::image('/images/icons/edit.png'),array('/gallery/admin/album','id' => $model->id));
} ?>
</h1>
<div class="row photogallery">
<?php foreach($model->photos as $m): ?>
<div class="gallery_item">
<div class="gallery_image">
<?php echo CHtml::link(CHtml::image($m->thumb),$m->image,array('rel'=>'fbox')); ?>
</div>
<div class="gallery_title">
<?php echo CHtml::encode($m->title); ?>
</div>
</div>
<?php endforeach; ?>
</div>
<a href="javascript:" id="getcode" class="dot">Получить код альбома</a>
<?php echo CHtml::textArea('hhh','',array('id'=>'hhh' , 'rows'=>4 , 'cols' => 100, 'style' => 'display: none')); ?>
<script type="text/javascript">
    $("#getcode").click(function(){
       $("#getcode").remove();
       $("#hhh").removeAttr('style');
    });
    var text = $.trim($(".photogallery").html())
    $("#hhh").text(text.replace(/(\r\n|\n|\r)/gm,""));
    $("#hhh").focus(function() {
        var $this = $(this);
        $this.select();

        // Work around Chrome's little problem
        $this.mouseup(function() {
            // Prevent further mouseup intervention
            $this.unbind("mouseup");
            return false;
        });
    });
</script>