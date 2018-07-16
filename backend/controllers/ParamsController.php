<?php

namespace backend\controllers;

use Yii;
use backend\models\Callback;
use backend\models\CallbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CallbackController implements the CRUD actions for Callback model.
 */
class ParamsController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'roles' => ['@'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Callback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new \backend\models\Params();

        if ($model->load(Yii::$app->params)) {
            if ($model->validate() && Yii::$app->request->post()) {
                $tempParams = json_encode(Yii::$app->request->post('Params'));
                $setPath = dirname(dirname(__DIR__)).'/common/config/set.json';
                file_put_contents($setPath , $tempParams);
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
