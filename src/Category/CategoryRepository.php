<?php namespace Anomaly\BlogModule\Category;

use Anomaly\BlogModule\Category\Contract\CategoryInterface;
use Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class CategoryRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Category
 */
class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * The category model.
     *
     * @var CategoryModel
     */
    protected $model;

    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryModel $model
     */
    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all categories.
     *
     * @return EntryCollection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a category by it's related
     * blog and it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
