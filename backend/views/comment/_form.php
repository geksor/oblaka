<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form box box-primary">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'box-body row']]); ?>
    <div class="col-xs-12">
        <?= $form->field($model, 'name')->textInput() ?>
    </div>
    <div class="col-xs-12">
        <?= $form->field($model, 'text')->textarea(['rows' => 10]) ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <?
        if($model->date) {
            $model->date = date("d.m.Y", (integer) $model->date);
        }
        ?>

        <?= $form->field($model, 'date')->widget(DateTimePicker::className(),[
            'name' => 'dp_1',
            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
            'options' => ['placeholder' => 'Ввод даты/времени...'],
            'convertFormat' => true,
            'value'=> $model->date,
            'pluginOptions' => [
                'format' => 'dd.MM.yyyy',
                'autoclose'=>true,
                'weekStart'=>1, //неделя начинается с понедельника
                'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
                'todayBtn'=>true, //снизу кнопка "сегодня"
                'minView'=>2,
            ]
        ]);?>
    </div>
    <div class="col-xs-12">
        <?= $form->field($model, 'publish')->checkbox() ?>
    </div>

    <div class="form-group col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Отмена', ['/comment'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
