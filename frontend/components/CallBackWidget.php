<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
use frontend\models\ContactForm;

class CallBackWidget extends Widget
{

    public function run()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->date = time();
            $model->save();
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Мы свяжемся с вами в ближайшее время.');
                $model = new ContactForm();
            } else {
                Yii::$app->session->setFlash('error', 'Что то пошло не так.');
            }
        }
        return $this->render('callBackWidget', [
            'model' => $model,
        ]);
    }

}