<?php $this->breadcrumbs = array(
    'Администрирование' => '/admin',
    'Меню'
);
$this->header = "Редактор меню";
?>
<?php $this->widget('MainMenu'); ?>

<?php $this->renderPartial('_items', array('model'=>$model)); ?>

<div class="row-fluid">
    <?php echo CHtml::link('Добавить новый пункт меню','/admin/menu/create'); ?>
</div>

