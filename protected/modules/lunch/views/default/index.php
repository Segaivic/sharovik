<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
    'Бизнес-ланч',
);
?>
<h1>Бизнес-ланч</h1>

<p>
    <?php echo $settings->description ?>
</p>
<h3>
    Бизнес-ланч на <?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy', LunchMain::setToWorkDay());?>:
</h3>

<div id="lunchWidget"></div>
<div class="row">
    <div class="span12">
        <?php foreach($model as $m): ?>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>
                    <h4><?php echo $m->title ?></h4>
                </td>
            </tr>
            <tr>
                <td style="width: 80%;">
                    <?php echo $m->description ?>
                    <p><b>Масса: <?php echo $m->weight ?> гр.</b></p>
                </td>
                <td style="width: 20%; text-align: right;">
                    <?php echo $m->price ?> руб.
                </td>
            </tr>
            </tbody>
        </table>
        <?php endforeach; ?>
    </div>
</div>