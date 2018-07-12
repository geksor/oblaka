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
            Yii::$app->session->setFlash('reEvents');
            $model = new BuyForm();
        }
        return $this->render('buyWidget', [
            'model' => $model,
        ]);
    }

}