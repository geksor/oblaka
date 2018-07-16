<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $name имя
 * @property string $text текст отзыва
 * @property int $date дата добавления
 * @property int $publish одобрить
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['name', 'text'], 'string'],
            [['publish'], 'integer'],
            [['date', 'view'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'имя',
            'text' => 'текст отзыва',
            'date' => 'дата добавления',
            'publish' => 'одобрить',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if (!is_integer($this->date)){
                $this->date = strtotime($this->date);
            }

            $this->view = 1;

            if($this->validate())
                return true;
        }
        return false;
    }
}
