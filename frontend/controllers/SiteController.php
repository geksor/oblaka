<?php
namespace frontend\controllers;

use frontend\models\Places;
use Yii;
use yii\web\Controller;
use frontend\models\CommentForm;

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
}
