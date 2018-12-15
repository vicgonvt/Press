<?php

namespace vicgonvt\Press;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function extra($field)
    {
        return optional(json_decode($this->extra))->$field;
    }
}