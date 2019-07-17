<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class YaKassaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'order-check' => ['post'],
                    'payment-notification' => ['post'],
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            'order-check' => [
                'class' => 'app\components\yakassa\actions\CheckOrderAction',
                'beforeResponse' => function ($request) {
                    /**
                     * @var \yii\web\Request $request
                     */
                    $invoice_id = (int) $request->post('orderNumber');
                    Yii::warning("Кто-то хотел купить несуществующую подписку! InvoiceId: {$invoice_id}", Yii::$app->yakassa->logCategory);
                    return false;
                }
            ],
            'payment-notification' => [
                'class' => 'app\components\yakassa\actions\PaymentAvisoAction',
                'beforeResponse' => function ($request) {
                    /**
                     * @var \yii\web\Request $request
                     */
                }
            ],
        ];
    }
}