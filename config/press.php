<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Source Driver
    |--------------------------------------------------------------------------
    |
    | Press allows you to select a driver that will be used for storing your
    | blog posts. By default, the file driver is used, however, additional
    | drivers are available, or write your own custom driver to suite.
    |
    | Supported: "file"
    |
    */

    'driver' => 'file',

    /*
    |--------------------------------------------------------------------------
    | File Driver Options
    |--------------------------------------------------------------------------
    |
    | Here you can specify any configuration options that should be used with
    | the file driver. The path option is a path to the directory with all
    | of the markdown files that will be processed inside the command.
    |
    */

    'file' => [
        'path' => 'blogs',
    ],

    /*
    |--------------------------------------------------------------------------
    | URI Address Path
    |--------------------------------------------------------------------------
    |
    | Use this path value to determine on what URI we are going to serve the
    | blog. For example, if you wanted to serve it at a different prefix
    | like www.example.com/my-blog, change the value to '/my-blog'.
    |
    */

    'path' => 'blogs',
];