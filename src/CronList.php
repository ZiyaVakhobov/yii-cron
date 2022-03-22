<?php

namespace Ziya\YiiCron;

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
                $cron = new $item;
                if ($cron->canExecute()) {
                    $cron->execute();
                }
            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}