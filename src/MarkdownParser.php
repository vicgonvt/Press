<?php

namespace vicgonvt\Press;

use Parsedown;

class MarkdownParser
{
    /**
     * Given a markdown string, it will pass back a parsed string.
     *
     * @param $string
     *
     * @return string
     */
    public static function parse($string)
    {
        return Parsedown::instance()->text($string);
    }
}