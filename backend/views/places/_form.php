<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Places */
/* @var $modelUpload backend\models\UploadImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="places-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'box-body row', 'enctype'=>'multipart/form-data']]); ?>
    <div class="col-xs-12">
        <?= $form->field($model, 'type')->textInput() ?>
    </div>

    <div class="col-xs-12">
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>

    <div class="col-xs-12">
        <?= $form->field($model, 'price')->textInput() ?>
    </div>

    <div class="col-xs-12 crop">
        <?php if($model->image): ?>
            <img src="<?= '/frontend/web/uploads/places/thumb_'.$model->image?>" alt="">
        <?php endif; ?>
        <?= $form->field($modelUpload, 'image')->widget(CropboxWidget::className(), [
            'croppedDataAttribute' => 'crop_info',
            'pluginOptions' => [
                    'variants' => [
                        [
                            'width' => 585,
                            'height' => 350
                        ],
                    ]
            ]
        ]); ?>
    </div>

    <div class="col-xs-12">
        <?= $form->field($model, 'count')->textInput() ?>
    </div>

    <div class="form-group col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
