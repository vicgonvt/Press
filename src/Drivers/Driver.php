<?php

namespace vicgonvt\Press\Drivers;

use vicgonvt\Press\PressFileParser;

abstract class Driver
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $posts = [];

    /**
     * Driver constructor.
     */
    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();
    }

    /**
     * Fetch and parse all of the posts for the given source.
     *
     * @return mixed
     */
    public abstract function fetchPosts();

    /**
     * Fetch the appropriate config array for this source.
     *
     * @return void
     */
    protected function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }

    /**
     * Perform any validation necessary to assert source is valid.
     *
     * @return bool
     */
    protected function validateSource()
    {
        return true;
    }

    /**
     * Instantiates the PressFileParser and build up an array of posts.
     *
     * @param $content
     * @param $identifier
     *
     * @return void
     */
    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => str_slug($identifier)]
        );
    }
}