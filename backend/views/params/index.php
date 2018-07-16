<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Params */
/* @var $form ActiveForm */

$this->title = 'Параметры';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="callback-index box box-primary">

    <div class="box-body" style="padding-top: 30px">

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'admin_email') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'company_name') ?>
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'inn') ?>
            <?= $form->field($model, 'ogrn') ?>
            <?= $form->field($model, 'vkLink') ?>
            <?= $form->field($model, 'instaLink') ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

</div><!-- index -->
