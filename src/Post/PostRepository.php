<?php namespace Anomaly\BlogsModule\Post;

use Anomaly\BlogsModule\Post\Contract\PostInterface;
use Anomaly\BlogsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class PostRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post
 */
class PostRepository implements PostRepositoryInterface
{

    /**
     * The post model.
     *
     * @var PostModel
     */
    protected $model;

    /**
     * Create a new PostRepository instance.
     *
     * @param PostModel $model
     */
    public function __construct(PostModel $model)
    {
        $this->model = $model;
    }

    /**
     * Get posts for a blog.
     *
     * @return EntryCollection
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return PostInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
