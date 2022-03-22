<?php

namespace Ziya\YiiCron\interfaces;

interface CronInterface
{
    /**
     * @return string
     */
    public static function key();

    /**
     * @return boolean
     */
    public function canExecute();

    /**
     * @return void
     */
    public function execute();
}