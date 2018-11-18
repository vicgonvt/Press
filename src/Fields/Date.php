<?php

namespace vicgonvt\Press\Fields;

use Carbon\Carbon;

class Date extends FieldContract
{
    /**
     * Process the field and make any modifications.
     *
     * @param $fieldType
     * @param $fieldValue
     * @param $data
     *
     * @return array
     */
    public static function process($fieldType, $fieldValue, $data)
    {
        return [
            $fieldType => Carbon::parse($fieldValue),
            'parsed_at' => Carbon::now(),
        ];
    }
}