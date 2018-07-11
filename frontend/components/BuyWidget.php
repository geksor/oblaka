<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
use frontend\models\BuyForm;

class BuyWidget extends Widget
{

    public function run()
    {
        $model = new BuyForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('reEvents');
                $model = new BuyForm();
            } else {
                Yii::$app->session->setFlash('error', 'Что то пошло не так.');
            }
        }
        return $this->render('buyWidget', [
            'model' => $model,
        ]);
    }

}