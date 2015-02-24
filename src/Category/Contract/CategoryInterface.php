<?php namespace Anomaly\BlogsModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface CategoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category\Contract
 */
interface CategoryInterface
{

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts();

    /**
     * Return the posts relation.
     *
     * @return HasMany
     */
    public function posts();
}
