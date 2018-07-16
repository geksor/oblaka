<?php

namespace backend\models;

use yii\base\Model;

class Params extends Model
{
    public $admin_email;
    public $phone;
    public $company_name;
    public $address;
    public $inn;
    public $ogrn;
    public $vkLink;
    public $instaLink;


    public function rules()
    {
        return [
            [['admin_email', 'phone', 'company_name', 'address', 'inn', 'ogrn', 'vkLink', 'instaLink'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_email' => 'E-mail',
            'phone' => 'Телефон',
            'company_name' => 'Название фирмы',
            'address' => 'Юридический адрес',
            'inn' => 'ИНН',
            'ogrn' => 'ОГРН',
            'vkLink' => 'Ссылка VK',
            'instaLink' => 'Ссылка instagram',
        ];
    }
}