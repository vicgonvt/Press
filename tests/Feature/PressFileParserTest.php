<?php

namespace vicgonvt\Press\Tests;

use Orchestra\Testbench\TestCase;
use vicgonvt\Press\PressFileParser;

class PressFileParserTest extends TestCase
{
    /** @test */
    public function the_head_and_body_gets_split()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertContains('title: My Title', $data[1]);
        $this->assertContains('description: Description here', $data[1]);
        $this->assertContains('Blog post body here', $data[2]);
    }
}