<?php
//breadcrumbs
$this->breadcrumbs = array(
        'Администрирование' => '/admin',
        'Управление страницами' => '/admin/page',
        'Новая страница'
);

//title
$this->pageTitle = 'Панель управления - новая страница';
$this->header = "Новая страница";
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
