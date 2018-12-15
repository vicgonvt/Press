<?php

namespace vicgonvt\Press;

class Press
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * Check if Press config file has been published and set.
     *
     * @return bool
     */
    public function configNotPublished()
    {
        return is_null(config('press'));
    }

    /**
     * Get an instance of the set driver.
     *
     * @return mixed
     */
    public function driver()
    {
        $driver = title_case(config('press.driver'));
        $class = 'vicgonvt\Press\Drivers\\' . $driver . 'Driver';

        return new $class;
    }

    /**
     * Get the currently set URI path for the blog.
     *
     * @return string
     */
    public function path()
    {
        return config('press.path', 'blogs');
    }

    /**
     * Merges an array of fields into the fields variable.
     *
     * @param array $fields
     */
    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    /**
     * Returns the list of available fields in reverse order.
     *
     * @return array
     */
    public function availableFields()
    {
        return array_reverse($this->fields);
    }
}