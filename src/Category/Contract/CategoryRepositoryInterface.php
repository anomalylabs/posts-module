<?php namespace Anomaly\PostsModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface CategoryRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Category\Contract
 */
interface CategoryRepositoryInterface
{

    /**
     * Return all categories.
     *
     * @return EntryCollection
     */
    public function all();

    /**
     * Find a category by it's ID.
     *
     * @param $id
     * @return null|CategoryInterface
     */
    public function find($id);

    /**
     * Find a category by it's related
     * posts and it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug);

    /**
     * Delete a category.
     *
     * @param CategoryInterface $category
     * @return bool
     */
    public function delete(CategoryInterface $category);
}
