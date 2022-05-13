<?php

namespace Ziya\YiiCron\checkers;

use common\models\CronRunResult;
use Ziya\YiiCron\models\CronRunTime;
use Ziya\YiiCron\interfaces\CheckerInterface;

class TimeChecker implements CheckerInterface
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    private function isValidTime($time,array $times=null)
    {
        return empty($times) || in_array($time,$times);
    }

    public function check($time)
    {
        
        $model = CronRunTime::findOne(['key' => $this->key]);
//        $result = CronRunResult::find()->where(['key'=>$this->key])->one();
//        $time = new \DateTime();
//        echo '<pre>';print_r($model); die();
        return $this->isValidTime($time->format('Y'),$model->year) &&
            $this->isValidTime($time->format('m'),$model->month) &&
            $this->isValidTime($time->format('d'),$model->day) &&
            $this->isValidTime($time->format('H'),$model->hour) &&
            $this->isValidTime($time->format('i'),$model->minutes);
    }
}