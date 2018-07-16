<?php

namespace backend\components;

use backend\models\Comment;
use yii\base\Widget;

class CommentCountWidget extends Widget
{
    public $toDay = false;

    public function run()
    {
        if ($this->toDay){
            $startDay = mktime(0,0,0);
            $endDay = mktime(23,59,59);
            return Comment::find()->where(['and', 'view=0', ['>', 'date', $startDay], ['<', 'date', $endDay]])->count();
        }
        return Comment::find()->where('view=0')->count();
    }
}