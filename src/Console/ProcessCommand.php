<?php

namespace vicgonvt\Press\Console;

use Illuminate\Console\Command;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';
    
    protected $description = 'Update blog posts.';

    public function handle()
    {
        $this->info('Hello');
    }
}