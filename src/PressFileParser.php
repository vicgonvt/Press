<?php

namespace vicgonvt\Press;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PressFileParser
{
    protected $filename;

    protected $data;

    public function __construct($filename)
    {
        $this->filename = $filename;
        
        $this->splitFile();

        $this->explodeData();

        $this->processFields();
    }

    public function getData()
    {
        return $this->data;
    }

    protected function splitFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->data
        );
    }

    protected function explodeData()
    {
        foreach (explode("\n", trim($this->data[1])) as $fieldString) {
            preg_match('/(.*):\s?(.*)/', $fieldString, $fieldArray);

            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        $this->data['body'] = trim($this->data[2]);
    }

    protected function processFields()
    {
        foreach ($this->data as $field => $value) {
            if ($field === 'date') {
                $this->data[$field] = Carbon::parse($value);
            } else if ($field === 'body') {
                $this->data[$field] = MarkdownParser::parse($value);
            }
        }
    }
}