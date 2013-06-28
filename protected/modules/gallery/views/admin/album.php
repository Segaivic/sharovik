<?php
    $this->breadcrumbs = array(
        'Администрирование' => '/admin',
        'Фотоальбомы' => '/gallery/admin',
        $model->title,
    )

?>

<h1 xmlns="http://www.w3.org/1999/html"><?php echo $model->title; ?></h1>
<a href="/gallery/admin/photos/<?php echo $model->id ?>" class="btn green add">Добавить фото</a>
<table class="table">
    <thead>
    <tr>
        <th>Изображение</th>
        <th>Описание</th>
        <th>Код для вставки</th>
    </tr>
    </thead>

<?php foreach ($model->photos as $photo): ?>
<tbody>
    <tr id="photos<?php echo $photo->id; ?>">
        <td><?php echo CHtml::link(CHtml::image($photo->thumb),$photo->image,array('rel'=>'gallery')); ?></td>
        <td>
            <?php echo CHtml::textArea('tt',$photo->title, array('cols'=>50 , 'rows'=>8, 'id'=>'tt'.$photo->id)); ?>
        </td>
        <td>
            <textarea class="embed" rows="8" cols="50">
                <a href="<?php echo $photo->image ?>" rel="fbox"><img src="<?php echo $photo->thumb ?>" title="<?php echo $photo->title ?>" /></a>
            </textarea>
        </td>
        <td>
            <p>
                <a href="javascript:" id="save<?php echo $photo->id; ?>" class="btn blue save savephoto">Сохранить</a>
            </p>
            <p>
                <a href="javascript:" id="del<?php echo $photo->id; ?>" class="btn b_delete">Удалить</a>
            </p>
        </td>
    </tr>
        </tbody>
<?php endforeach; ?>

</table>

<script type="text/javascript">
    $(".embed").focus(function() {
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