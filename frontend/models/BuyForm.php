<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class BuyForm extends ActiveRecord
{

    public $name;
    public $phone;
    public $placeCount;
    public $class;
    public $transfer;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone', 'placeCount'], 'required', 'message' => 'Заполните поле'],
            [['class', 'transfer'], 'safe'],
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
}
