<?php namespace Anomaly\PostsModule\Post\Plugin;

use Anomaly\PostsModule\Post\Plugin\Command\FindPost;
use Anomaly\PostsModule\Post\Plugin\Command\GetPosts;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PostPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Plugin
 */
class PostPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'post',
                function (array $parameters = []) {
                    return $this->dispatch(new FindPost($parameters));
                }
            ),
            new \Twig_SimpleFunction(
                'posts',
                function (array $parameters = []) {
                    return $this->dispatch(new GetPosts($parameters));
                }
            )
        ];
    }
}
