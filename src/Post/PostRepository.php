<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Entry\EntryModel;

/**
 * Class PostRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
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
     * Find a post by it's ID.
     *
     * @param $id
     * @return null|PostInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
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
        return $this->model->where('tags', 'LIKE', '%' . $tag . '%')->paginate($limit);
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
            ->orderBy('created_at', 'DESC')
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
        return $this->model->with(['category'])->orderBy('created_at', 'DESC')->paginate($limit);
    }

    /**
     * Delete a post.
     *
     * @param PostInterface|EntryModel $post
     * @return bool
     */
    public function delete(PostInterface $post)
    {
        return $post->delete();
    }
}
