<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CallbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на обратный звонок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callback-index box box-primary">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-body" style="padding-top: 30px">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name:ntext',
            'phone',
            [
                'attribute' => 'date',
                'headerOptions' => ['width' => '150'],
                'format' => ['date', 'php: d.m.Y - H:m'],
            ],
            [
                'attribute' => 'status',
                'filter'=>[0=>"Не обработано",1=>"Обработано"],
                'headerOptions' => ['width' => '170'],
                'format' => 'raw',
                'value' =>     function ($model){
                    if ($model->status == 0){
                        return Html::a(
                        'Обработать',
                            Url::to(['/callback/status','id'=>$model->id, 'val'=>1]),
                            ['class'=>'btn btn-success col-xs-12']
                        );
                    }else{
                        return 'Обработано';
                    }
                }
            ],

        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
