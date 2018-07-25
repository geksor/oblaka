<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

class UploadImage extends Model{

    public $image;
    public $crop_info;

    public function rules(){
        return[
            [
                'image',
                'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
            ],
            ['crop_info', 'safe'],
        ];
    }

    public function upload($imageName){
        if($this->validate()){
            if($imageName){
                $oldImageName = $imageName;
            }
            $time = time();
            $this->image = UploadedFile::getInstance($this, 'image');
            $path = Yii::getAlias('@frontend/web/uploads/places');
            $name = $this->image->getBaseName() . $time . '.' . $this->image->getExtension();
            // open image
            $image = Image::getImagine()->open($this->image->tempName);

            // rendering information about crop of ONE option
            $cropInfo = Json::decode($this->crop_info)[0];
            $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
            $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
            $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
            $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y
            // Properties bolow we don't use in this example
            //$cropInfo['ratio'] = $cropInfo['ratio'] == 0 ? 1.0 : (float)$cropInfo['ratio']; //ratio image.
            $cropInfo['width'] = (int)$cropInfo['width']; //width of cropped image
            $cropInfo['height'] = (int)$cropInfo['height']; //height of cropped image
//        $cropInfo['sWidth'] = (int)$cropInfo['sWidth']; //width of source image
            //$cropInfo['sHeight'] = (int)$cropInfo['sHeight']; //height of source image

            //delete old images
            $oldImages = FileHelper::findFiles($path, [
                'only' => [
                    $oldImageName . '.*',
                    'thumb_' . $oldImageName . '.*',
                ],
            ]);
            for ($i = 0; $i != count($oldImages); $i++) {
                @unlink($oldImages[$i]);
            }

            //saving thumbnail
            $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
            $cropSizeThumb = new Box($cropInfo['width'], $cropInfo['height']); //frame size of crop
            $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
            $pathThumbImage = $path
                . '/thumb_'
                . $name;

            $image->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);

            //saving original
            $this->image->saveAs(
                $path
                . '/'
                . $name
            );
            return $name;
        }else{
            return false;
        }
    }
}