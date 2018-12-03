<?php

namespace vicgonvt\Press\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use vicgonvt\Press\Post;
use vicgonvt\Press\PressFileParser;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';
    
    protected $description = 'Update blog posts.';

    public function handle()
    {
        $files = File::files('blogs');

        foreach ($files as $file) {
            $post = (new PressFileParser($file->getPathname()))->getData();
        }

        Post::create([
            'identifier' => str_random(),
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? [],
        ]);
    }
}