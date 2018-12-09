<?php

namespace vicgonvt\Press\Repositories;

use vicgonvt\Press\Post;

class PostRepository
{
    /**
     * Takes a post array and updates or creates it on the database.
     *
     * @param $post
     *
     * @return void
     */
    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier'],
        ], [
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? json_encode([]),
        ]);
    }
}