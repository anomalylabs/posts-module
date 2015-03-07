<?php namespace Anomaly\BlogModule\Post\Contract;

use Anomaly\BlogModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface PostRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
interface PostRepositoryInterface
{

    /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return PostInterface
     */
    public function findBySlug($slug);

    /**
     * Find many posts by tag.
     *
     * @param $tag
     * @return EntryCollection
     */
    public function findManyByTag($tag);

    /**
     * Find many posts by category.
     *
     * @param CategoryInterface $category
     * @return EntryCollection
     */
    public function findManyByCategory(CategoryInterface $category);

    /**
     * Get recent posts.
     *
     * @return EntryCollection
     */
    public function getRecent();
}
