<?php namespace Anomaly\PostsModule;

use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\PluginQuery;
use Robbo\Presenter\Decorator;

/**
 * Class PostsModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule
 */
class PostsModulePluginFunctions
{

    /**
     * The query utility.
     *
     * @var PluginQuery
     */
    protected $query;

    /**
     * The post repository.
     *
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * The category repository.
     *
     * @var CategoryRepositoryInterface
     */
    protected $categories;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new PostsModulePluginFunctions instance.
     *
     * @param PostRepositoryInterface     $posts
     * @param CategoryRepositoryInterface $categories
     * @param Decorator                   $decorator
     * @param PluginQuery                 $query
     */
    public function __construct(
        PostRepositoryInterface $posts,
        CategoryRepositoryInterface $categories,
        Decorator $decorator,
        PluginQuery $query
    ) {
        $this->posts      = $posts;
        $this->query      = $query;
        $this->decorator  = $decorator;
        $this->categories = $categories;
    }

    /**
     * Return recent posts.
     *
     * @param array $parameters
     * @return \Anomaly\Streams\Platform\Entry\EntryCollection
     */
    public function recentPosts(array $parameters = [])
    {
        $tag      = array_get($parameters, 'tag');
        $category = array_get($parameters, 'category');
        $limit    = array_get($parameters, 'limit', 15);

        if ($category && $category = $this->categories->findBySlug($category)) {
            $posts = $this->posts->findManyByCategory($category, $limit);
        } elseif ($tag) {
            $posts = $this->posts->findManyByTag($category, $limit);
        } else {
            $posts = $this->posts->getRecent($limit);
        }

        return $this->decorator->decorate($posts);
    }

    /**
     * Return all categories.
     *
     * @return \Anomaly\Streams\Platform\Entry\EntryCollection
     */
    public function categories()
    {
        return $this->query->get(
            [
                'stream'    => 'categories',
                'namespace' => 'posts',
                'order_by'  => 'sort_order'
            ]
        );
    }
}
