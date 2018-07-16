<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Comment */

$this->title = 'Создать отзыв';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
