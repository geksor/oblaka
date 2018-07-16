<?php

namespace backend\components;

use backend\models\Callback;
use yii\base\Widget;

class CallbackCountWidget extends Widget
{
    public $toDay = false;

    public function run()
    {
        if ($this->toDay){
            $startDay = mktime(0,0,0);
            $endDay = mktime(23,59,59);
            return Callback::find()->where(['and', 'status=0', ['>', 'date', $startDay], ['<', 'date', $endDay]])->count();
        }
        return Callback::find()->where('status=0')->count();
    }
}