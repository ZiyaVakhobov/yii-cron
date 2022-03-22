<?php

namespace Ziya\YiiCron\checkers;

use Ziya\YiiCron\models\CronRunTime;
use Ziya\YiiCron\interfaces\CheckerInterface;

class TimeChecker implements CheckerInterface
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function check()
    {
        $model = CronRunTime::findOne(['key' => $this->key]);

        if ($model !== null) {
            return $model->validDate(
                new \DateTime('now')
            );
        }

        return false;
    }
}