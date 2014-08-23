<?php namespace Addon\Module\Blog\Installer;

use Streams\Core\Stream\Installer\StreamInstaller;

class CategoriesStreamInstaller extends StreamInstaller
{
    /**
     * The stream field assignments definitions.
     *
     * @var array
     */
    protected $assignments = array(
        'title' => ['is_required' => true],
        'slug'  => ['is_required' => true, 'is_unique' => true],
    );
}
