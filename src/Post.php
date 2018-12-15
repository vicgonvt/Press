<?php

namespace vicgonvt\Press;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Easy accessor for any of the fields in the extra column.
     *
     * @param $field
     *
     * @return mixed
     */
    public function extra($field)
    {
        return optional(json_decode($this->extra))->$field;
    }
}