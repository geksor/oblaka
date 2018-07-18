<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $modelUpload backend\models\UploadImage */
/* @var $model backend\models\Places */

$this->title = 'Create Places';
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-create box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'modelUpload' => $modelUpload,
    ]) ?>

</div>
