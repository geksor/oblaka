<?php

namespace frontend\models;

use yii\db\ActiveRecord;


/**
 * ContactForm is the model behind the contact form.
 */
class CommentForm extends ActiveRecord
{
    use SendEmailTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'text'], 'required', 'message' => 'Заполните поле'],
            [['date', 'subject', 'body'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'text' => 'Текст отзыва'
        ];
    }

    public static function tableName()
    {
        return 'comment';
    }
}
