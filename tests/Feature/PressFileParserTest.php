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
    
    /** @test */
    public function each_head_field_gets_separated()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertEquals('My Title', $data['title']);
        $this->assertEquals('Description here', $data['description']);
    }
    
    /** @test */
    public function the_body_gets_saved_and_trimmed()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertEquals("# Heading\n\nBlog post body here", $data['body']);
    }
}