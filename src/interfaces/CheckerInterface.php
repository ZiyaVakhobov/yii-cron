<?php

namespace Ziya\YiiCron\interfaces;

interface CheckerInterface
{
    /**
     * @return boolean
     */
    public function check();
}