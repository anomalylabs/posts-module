<?php namespace Anomaly\BlogsModule\Category;

use Anomaly\BlogsModule\Category\Contract\CategoryInterface;
use Anomaly\BlogsModule\Category\Contract\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category
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
