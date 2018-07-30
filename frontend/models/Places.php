<?php

namespace frontend\models;

use yii\db\ActiveRecord;


/**
 * ContactForm is the model behind the contact form.
 */
class Places extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'description', 'price'], 'required'],
            [['type', 'description', 'image'], 'string'],
            [['price', 'count'], 'integer'],
        ];
    }

    public static function tableName()
    {
        return 'places';
    }
}
