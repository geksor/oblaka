<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelUpload backend\models\UploadImage */
/* @var $model backend\models\Places */

$this->title = 'Изменение места: ' . $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->type;

?>
<div class="places-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUpload' => $modelUpload,
    ]) ?>

</div>
