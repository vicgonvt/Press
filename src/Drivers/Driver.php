<?php

namespace vicgonvt\Press\Drivers;

use vicgonvt\Press\PressFileParser;

abstract class Driver
{
    protected $config;

    protected $posts = [];

    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();
    }

    public abstract function fetchPosts();

    protected function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }

    protected function validateSource()
    {
        return true;
    }

    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => str_slug($identifier)]
        );
    }
}