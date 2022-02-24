<?php

namespace App\Traits;

trait DisplayTrait
{
    /**
     * @param $msg
     * @return void
     */
    public function message($msg)
    {
        echo $msg . PHP_EOL;
    }
}