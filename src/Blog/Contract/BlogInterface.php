<?php namespace Anomaly\BlogModule\Blog\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface BlogInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Blog\Contract
 */
interface BlogInterface
{

    /**
     * Get the ID.
     *
     * @return int
     */
    public function getId();

    /**
     * Get the slug.
     *
     * @return string.
     */
    public function getSlug();

    /**
     * Get the description.
     *
     * @return string.
     */
    public function getDescription();

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts();

    /**
     * Return the posts relationship.
     *
     * @return HasMany
     */
    public function posts();
}
