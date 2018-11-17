<?php

namespace vicgonvt\Press\Fields;

use vicgonvt\Press\MarkdownParser;

class Body
{
    public static function process($type, $value)
    {
        return [
            $type => MarkdownParser::parse($value),
        ];
    }
}