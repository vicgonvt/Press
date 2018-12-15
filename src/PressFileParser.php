<?php

namespace vicgonvt\Press;

use Illuminate\Support\Facades\File;
use ReflectionClass;

class PressFileParser
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $rawData;

    /**
     * @var array
     */
    protected $data;

    /**
     * PressFileParser constructor.
     *
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        
        $this->splitFile();

        $this->explodeData();

        $this->processFields();
    }

    /**
     * Get the underlying parsed data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the underlying raw data.
     *
     * @return mixed
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * It separates the head from the body for further manipulation
     *
     * @return void
     */
    protected function splitFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->rawData
        );
    }

    /**
     * Separate each line in the head, trims it and saves it, along with the body.
     *
     * @return void
     */
    protected function explodeData()
    {
        foreach (explode("\n", trim($this->rawData[1])) as $fieldString) {
            preg_match('/(.*):\s?(.*)/', $fieldString, $fieldArray);

            $this->data[$fieldArray[1]] = $fieldArray[2];
        }

        $this->data['body'] = trim($this->rawData[2]);
    }

    /**
     * Iterates through each field and tries to find a class with a matching name. If found
     * it will call a process() method on it. Any other fields, get sent sent to a catch
     * all class called Extra, where they will be merged and JSON encoded in extra.
     *
     * @return void
     */
    protected function processFields()
    {
        foreach ($this->data as $field => $value) {

            $class = $this->getField(title_case($field));

            if ( ! class_exists($class) && ! method_exists($class, 'process')) {
                $class = 'vicgonvt\\Press\\Fields\\Extra';
            }

            $this->data = array_merge(
                $this->data,
                $class::process($field, $value, $this->data)
            );
        }
    }

    private function getField($field)
    {
        foreach (\vicgonvt\Press\Facades\Press::availableFields() as $availableField) {
            $class = new ReflectionClass($availableField);

            if ($class->getShortName() == $field) {
                return $class->getName();
            }
        }
    }
}