<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentSearche */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index box box-primary">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="box-header">
        <?= Html::a('Создать отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table dataTable table-bordered table-condensed table-striped table-hover'
            ],
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['width' => '50'],
                ],

                [
                    'attribute' => 'name',
                    'headerOptions' => ['width' => '150'],
                    'format' => 'ntext',
                ],
                'text:ntext',
                [
                    'attribute' => 'date',
                    'headerOptions' => ['width' => '150'],
                    'format' => ['date', 'php:d.m.Y - H:m'],
                ],
                [
                        'attribute' => 'publish',
                    'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                    'headerOptions' => ['width' => '170'],
                    'format' => 'raw',
                    'label' => 'состояние',
                    'value' =>     function ($model){
                        if ($model->publish == 0){
                            return Html::a(
                                'Опубликовать',
                                Url::to(['/comment/publish','id'=>$model->id, 'val'=>1]),
                                ['class'=>'btn btn-success col-xs-12']);
                        }else{
                            return Html::a(
                                    'Снять с публикации',
                                Url::to(['/comment/publish','id'=>$model->id, 'val'=>0]),
                                    ['class'=>'btn btn-warning col-xs-12']);
                        }
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['width' => '50'],
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
