<?php

namespace frontend\models;

use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class BuyForm extends ContactForm
{
    public $class;
    public $placeCount;
    public $transfer;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone', 'placeCount'], 'required', 'message' => 'Заполните поле'],
            [['subject', 'body', 'class', 'transfer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'placeCount' => 'Количество мест',
        ];
    }

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
