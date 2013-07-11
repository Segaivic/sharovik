<?php
$this->breadcrumbs = array(
    'События' => '/events/admin/index',
    'Заявки' => '/events/admin/reserve/index',
    'Заявка на '.$model->date_start
);
?>
<h2>
    Заявка на <?php echo Yii::app()->dateFormatter->format("dd MMMM y", $model->date_start) ?> г.</h2>

    <table class="table table-striped">
        <tbody>
            <tr>
                <td style="width: 20%;">
                    Заголовок:
                </td>
                <td>
                    <?php echo CHtml::encode($model->title); ?>
                </td>
            </tr>

            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    <?php if($model->date_start == $model->date_end){ ?>
                    <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_start) ?>
                    <?php } else { ?>
                        С <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_start) ?> по <?php echo Yii::app()->dateFormatter->format("dd.MM.y", $model->date_end); ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Информация:
                </td>
                <td>
                    <?php echo $model->description; ?>
                </td>
            </tr>
            <tr>
        </tbody>
    </table>
