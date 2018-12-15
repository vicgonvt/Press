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
            'extra' => $this->extra($post),
        ]);
    }

    /**
     * Collect all of the extra fields to set it as a json string.
     *
     * @param $post
     *
     * @return false|string
     */
    private function extra($post)
    {
        $extra = (array)json_decode($post['extra'] ?? '[]');
        $attributes = array_except($post, ['title', 'body', 'identifier', 'extra']);

        return json_encode(array_merge($extra, $attributes));
    }
}