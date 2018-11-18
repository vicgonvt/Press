<?php

namespace vicgonvt\Press\Fields;

abstract class FieldContract
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
            $fieldType => $fieldValue
        ];
    }
}