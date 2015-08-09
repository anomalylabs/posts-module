<?php namespace Anomaly\PostsModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PostsModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule
 */
class PostsModulePlugin extends Plugin
{

    /**
     * The plugin functions.
     *
     * @var PostsModulePluginFunctions
     */
    protected $functions;

    /**
     * Create a new PostsModulePlugin instance.
     *
     * @param PostsModulePluginFunctions $functions
     */
    function __construct(PostsModulePluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('posts_recent', [$this->functions, 'recentPosts']),
            new \Twig_SimpleFunction('posts_categories', [$this->functions, 'categories'])
        ];
    }
}
