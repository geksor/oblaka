<?php

namespace frontend\models;

use Yii;

trait SendEmailTrait
{
    public $subject;
    public $body;

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['geksor@gmil.com' => 'Георгий'])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}