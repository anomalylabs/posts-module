<?php namespace Anomaly\Streams\Module\Blog;

use Streams\Core\Addon\ModuleAbstract;

class BlogModule extends ModuleAbstract
{
    /**
     * Module sections.
     *
     * @var array
     */
    public $sections = array(
        array(
            'path'    => 'admin/blog',
            'title'   => 'Posts',
            'actions' => array(
                array(
                    'path'  => 'admin/blog/create',
                    'title' => 'Add',
                )
            ),
        ),
        array(
            'path'  => 'admin/blog/categories',
            'title' => 'Categories',
        ),
    );

    /**
     * The icon to represent the module.
     *
     * @var string
     */
    public $icon = '<i class="fa fa-rss-square"></i>';
}
