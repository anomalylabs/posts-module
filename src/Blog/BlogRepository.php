<?php namespace Anomaly\BlogsModule\Blog;

use Anomaly\BlogsModule\Blog\Contract\BlogRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class BlogRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog
 */
class BlogRepository implements BlogRepositoryInterface
{

    /**
     * The log model.
     *
     * @var BlogModel
     */
    protected $model;

    /**
     * Create a new BlogRepository instance.
     *
     * @param BlogModel $model
     */
    public function __construct(BlogModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all enabled blogs.
     *
     * @return EntryCollection
     */
    public function enabled()
    {
        return $this->model->get();
    }
}
