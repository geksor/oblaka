<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property string $type Тип места
 * @property string $description Описание
 * @property int $price Цена
 * @property string $image Изображение
 * @property int $count Количество
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'description', 'price'], 'required'],
            [['type', 'description', 'image'], 'string'],
            [['price', 'count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип места',
            'description' => 'Описание',
            'price' => 'Цена',
            'image' => 'Изображение',
            'count' => 'Количество',
        ];
    }
}
