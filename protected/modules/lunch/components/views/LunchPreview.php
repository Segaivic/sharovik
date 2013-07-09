<div>
<!--   Дата ланча-->
<?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy', LunchMain::setToWorkDay());?>:
<br />
<!--Картинка-->
<img src="http://placehold.it/50x50" title="любая картинка" style="float: left; padding: 5px" />

<!--Описание-->
<?php echo $model->description; ?>
<p>
    <a href="/lunch">Перейти к меню!</a>
</p>
</div>