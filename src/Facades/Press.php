<?php

namespace vicgonvt\Press\Facades;

use Illuminate\Support\Facades\Facade;

class Press extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Press';
    }
}