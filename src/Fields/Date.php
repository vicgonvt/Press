<?php

namespace vicgonvt\Press\Fields;

use Carbon\Carbon;

class Date extends FieldContract
{
    public static function process($type, $value, $data)
    {
        return [
            $type => Carbon::parse($value),
            'parsed_at' => Carbon::now(),
            'foo' => 'bar',
        ];
    }
}