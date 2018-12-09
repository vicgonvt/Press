<?php

namespace vicgonvt\Press;

class Press
{
    /**
     * Check if Press config file has been published and set.
     *
     * @return bool
     */
    public static function configNotPublished()
    {
        return is_null(config('press'));
    }

    /**
     * Get an instance of the set driver.
     *
     * @return mixed
     */
    public static function driver()
    {
        $driver = title_case(config('press.driver'));
        $class = 'vicgonvt\Press\Drivers\\' . $driver . 'Driver';

        return new $class;
    }

    public static function path()
    {
        return config('press.path', 'blogs');
    }
}