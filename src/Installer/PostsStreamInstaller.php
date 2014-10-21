<?php namespace Anomaly\Streams\Module\Blog\Installer;

use Streams\Core\Stream\Installer\StreamInstaller;

class PostsStreamInstaller extends StreamInstaller
{
    /**
     * The stream field assignments definitions.
     *
     * @var array
     */
    protected $assignments = [
        'title'        => ['is_required' => true],
        'slug'         => ['is_required' => true, 'is_unique' => true],
        'status'       => ['is_required' => true],
        'content'      => [],
        'introduction' => [],
        'category'     => [],
        'keywords'     => [],
        'post_date'    => [],
        'comments'     => ['is_required' => true],
    ];
}
