<?php

namespace Ziya\YiiCron;

use Ziya\YiiCron\models\CronRunResult;
use Ziya\YiiCron\interfaces\CronInterface;

class CronList
{
    /**
     * @var array $list
     */
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function execute()
    {
        try {
            foreach ($this->list as $item) {
                /**
                 * @var CronInterface $cron
                 */
                $cron = \Yii::createObject($item);


                if ($cron->canExecute()) {

                    $result = new CronRunResult();
                    $result->key = $cron->key();
                    $result->start_time = date('Y-m-d H:i:s');
                    $result->save();

                    try {
                        $cron->execute();
                        $result->result = 1;
                    } catch (\Exception $exception) {
                        $message = array('message'=>$exception->getMessage(),'file'=>$exception->getFile(),'line'=>$exception->getLine());
                        $cron->addLog($message);
                        $result->result = 0;
                    }
                    $result->end_time = date('Y-m-d H:i:s');
                    $result->log = $cron->getLogs();
                    $result->save();
                }


            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}