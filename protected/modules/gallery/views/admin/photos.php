<?php
    $this->breadcrumbs = array(
     'Администрирование' => '/admin',
     'Фотоальбомы' => '/gallery/admin/',
     $gallery->title => '/gallery/admin/album/'.$gallery->id,
     'Загрузка фото'
    );

$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->getModule('gallery')->bu.'/js/multiupload.js');
$cs->registerScriptFile(Yii::app()->getModule('gallery')->bu.'/js/mpconfig.js' ,CClientScript::POS_END);

$this->header = "Фотоальбом ".$gallery->title;
?>

<?php $this->renderPartial('_photos' , array('model'=>$model , 'gallery' => $gallery)); ?>