<?php namespace Anomaly\PostsModule\Category;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Entry\EntryModel;

/**
 * Class CategoryRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Category
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
     * Find a category by it's ID.
     *
     * @param $id
     * @return null|CategoryInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a category by it's related
     * posts and it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Delete a category.
     *
     * @param CategoryInterface|EntryModel $category
     * @return bool
     */
    public function delete(CategoryInterface $category)
    {
        return $category->delete();
    }
}
