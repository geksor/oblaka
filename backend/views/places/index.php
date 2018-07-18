<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Места';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-index box box-primary">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="box-header">
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table dataTable table-bordered table-condensed table-striped table-hover text-center'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['width' => '30'],
            ],

            [
                'attribute' =>'type',
                'headerOptions' => ['width' => '200'],
            ],
            [
                'attribute' =>'description',
                'headerOptions' => ['width' => 'auto'],
            ],
            [
                'attribute' =>'price',
                'headerOptions' => ['width' => '100'],
            ],
            [
                'attribute' => 'count',
                'headerOptions' => ['width' => '130'],
                'format'=> 'raw',
                'value' => function ($model){
                    $down = Html::a(
                    '-',
                    Url::to(['/places/update-column','id'=>$model->id, 'val'=>$model->count - 1]),
                    ['class'=>'btn btn-default']);
                    $inp = Html::beginTag('span', ['class' => 'placeCount']).$model->count.Html::endTag('span');
                    $up = Html::a(
                        '+',
                        Url::to(['/places/update-column','id'=>$model->id, 'val'=>$model->count + 1]),
                        ['class'=>'btn btn-default']);
                    return $inp.$down.$up;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
