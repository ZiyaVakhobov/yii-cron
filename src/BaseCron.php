<?php

namespace Ziya\YiiCron;

use Ziya\YiiCron\models\CronRunTime;
use Ziya\YiiCron\interfaces\CronInterface;

abstract class BaseCron implements CronInterface
{
    public function canExecute()
    {
        $model = CronRunTime::findOne(['key' => static::key()]);

        if ($model !== null) {
            return $model->validDate(
                new \DateTime()
            );
        }

        return false;
    }
}