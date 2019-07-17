<?php
namespace frontend\controllers;

use frontend\models\Order;
use frontend\models\Places;
use Yii;
use yii\web\Controller;
use frontend\models\CommentForm;
use YandexCheckout\Client;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $comments = CommentForm::find()
            ->select('name,text,date')
            ->where(['and', 'publish=1', ['<', 'date', time()]])
            ->orderBy(['date' => SORT_DESC])
            ->asArray()->all();
        $places = Places::find()->asArray()->all();
        return $this->render('index', ['comments' => $comments, 'places' => $places]);
    }

    public function actionPlaces($id)
    {
        if (Yii::$app->request->isAjax){
            $model = Places::findOne($id);

            return json_encode($model->count);
        }
        return json_encode(0);
    }

    public function actionPayment()
    {
        $client = new Client();
        $client->setAuth('525263', 'test_8_N7Q3cbnV0ffWYfHExB22iLZjzEhESrGs9-UNVS6wk');
        $payment = $client->createPayment(
            array(
                'amount' => array(
                    'value' => 2.00,
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => 'https://vosvojasi.ru/',
                ),
                'description' => 'Тестовый заказ',
            ),
            uniqid(Order::getQuidv4(), true)
        );

        return $this->redirect($payment['confirmation']['confirmationUrl']);

//        return $this->render('payment', ['payment' => $payment]);
    }
}
