<?php namespace Anomaly\BlogModule\Post;

use Anomaly\BlogModule\Post\Contract\PostInterface;
use Anomaly\BlogModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class PostRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
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

    /**
     * Get recent posts.
     *
     * @return EntryCollection
     */
    public function getRecent()
    {
        return $this->model->orderBy('created_at', 'DESC')->limit(15)->get();
    }
}
