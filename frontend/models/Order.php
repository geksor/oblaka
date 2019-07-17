<?php

namespace frontend\models;

use kroshilin\yakassa\OrderInterface;
use yii\db\ActiveRecord;


/**
 * ContactForm is the model behind the contact form.
 */
class Order extends ActiveRecord implements OrderInterface
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

    public static function getQuidv4()
    {
        $data = random_bytes(16);
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function getTotalPrice()
    {
        return 100;
        // TODO: Implement getTotalPrice() method.
    }
    public function getId($autoGenerate = true)
    {
        // TODO: Implement getId() method.
        return 20;
    }
}
