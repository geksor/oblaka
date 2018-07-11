<?php

namespace frontend\components;

use Yii;
use yii\base\Widget;
use frontend\models\CommentForm;

class CommentWidget extends Widget
{

    public function run()
    {
        $model = new CommentForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо за ваш отзыв!');
                $model = new CommentForm();
            } else {
                Yii::$app->session->setFlash('error', 'Что то пошло не так.');
            }
        }
        return $this->render('commentWidget', [
            'model' => $model,
        ]);
    }

}