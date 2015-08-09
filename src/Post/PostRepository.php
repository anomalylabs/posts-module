<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class PostRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostRepository extends EntryRepository implements PostRepositoryInterface
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
     * Find a post by it's string ID.
     *
     * @param $id
     * @return null|PostInterface
     */
    public function findByStrId($id)
    {
        return $this->model->where('str_id', $id)->first();
    }

    /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return null|PostInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->orderBy('created_at', 'DESC')->where('slug', $slug)->first();
    }

    /**
     * Find man posts by tag.
     *
     * @param      $tag
     * @param null $limit
     * @return EntryCollection
     */
    public function findManyByTag($tag, $limit = null)
    {
        return $this->model
            ->active()
            ->where('tags', 'LIKE', '%' . $tag . '%')
            ->paginate($limit);
    }

    /**
     * Find many posts by category.
     *
     * @param CategoryInterface $category
     * @param null              $limit
     * @return EntryCollection
     */
    public function findManyByCategory(CategoryInterface $category, $limit = null)
    {
        return $this->model
            ->active()
            ->where('category_id', $category->getId())
            ->paginate($limit);
    }

    /**
     * Get recent posts.
     *
     * @return EntryCollection
     */
    public function getRecent($limit = null)
    {
        return $this->model
            ->active()
            ->paginate($limit);
    }
}
