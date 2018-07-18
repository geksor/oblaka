<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model{

    public $image;

    public function rules(){
        return[
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload(){
        if($this->validate()){
            $this->image = UploadedFile::getInstance($this, 'image');
            $this->image->saveAs(Yii::getAlias('@frontend')."/web/uploads/{$this->image->baseName}.{$this->image->extension}");
        }else{
            return false;
        }
    }
}