<?php

namespace vicgonvt\Press\Tests;

use Orchestra\Testbench\TestCase;
use vicgonvt\Press\MarkdownParser;

class MarkdownTest extends TestCase
{
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $this->assertEquals('<h1>Heading</h1>', MarkdownParser::parse('# Heading'));
    }
}