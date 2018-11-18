<?php

namespace vicgonvt\Press\Fields;

class Extra extends FieldContract
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
        $extra = isset($data['extra']) ? (array)json_decode($data['extra']) : [];

        return [
            'extra' => json_encode(array_merge($extra, [
                $fieldType => $fieldValue,
            ]))
        ];
    }
}