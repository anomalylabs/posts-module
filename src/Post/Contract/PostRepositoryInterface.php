<?php namespace Anomaly\PostsModule\Post\Contract;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface PostRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
interface PostRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return null|PostInterface
     */
    public function findBySlug($slug);

    /**
     * Find a post by it's string ID.
     *
     * @param $id
     * @return null|PostInterface
     */
    public function findByStrId($id);

    /**
     * Find many posts by tag.
     *
     * @param      $tag
     * @param null $limit
     * @return EntryCollection
     */
    public function findManyByTag($tag, $limit = null);

    /**
     * Find many posts by category.
     *
     * @param CategoryInterface $category
     * @param null              $limit
     * @return EntryCollection
     */
    public function findManyByCategory(CategoryInterface $category, $limit = null);

    /**
     * Get recent posts.
     *
     * @param null $limit
     * @return EntryCollection
     */
    public function getRecent($limit = null);

    /**
     * Get featured posts.
     *
     * @param null $limit
     * @return EntryCollection
     */
    public function getFeatured($limit = null);
}
