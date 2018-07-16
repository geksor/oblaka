<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "callback".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $phone Телефон
 * @property int $date Дата запроса
 * @property int $status Статус
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'date'], 'required'],
            [['name'], 'string'],
            [['date', 'status'], 'integer'],
            [['phone'], 'string', 'max' => 124],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'date' => 'Дата запроса',
            'status' => 'Статус',
        ];
    }
}
