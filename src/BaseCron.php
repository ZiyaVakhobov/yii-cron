<?php

namespace Ziya\YiiCron;

use yii\base\BaseObject;
use Ziya\YiiCron\models\CronRunTime;
use Ziya\YiiCron\interfaces\CronInterface;
use Cron\CronExpression;

abstract class BaseCron extends BaseObject implements CronInterface
{
    private $log = [];
    
    public function addLog($message)
    {
        $this->log[] = [
            'time' => date('Y-m-d H:i:s'),
            'message' => $message
        ];
    }

    public function getLogs()
    {
        return $this->log;
    }
    
    public static function key()
    {
        return '';
    }

    private function isValidTime($time,array $times)
    {
        return empty($times) || in_array($time,$times);
    }

    private function isValidTimeModel(CronRunTime $runTime)
    {
        $time = new \DateTime();
        return $runTime->is_active && $this->isValidTime($time->format('Y'),$runTime->year) &&
            $this->isValidTime($time->format('m'),$runTime->month) &&
            $this->isValidTime($time->format('d'),$runTime->day) &&
            $this->isValidTime($time->format('H'),$runTime->hour) &&
            $this->isValidTime($time->format('i'),$runTime->minutes);
    }


    public function canExecute()
    {
        $models = CronRunTime::findAll(['key' => static::key()]);
        foreach ($models as $model) {
            if ($this->isValidTimeModel($model))
                return true;
        }
        
        return false;
    }
}