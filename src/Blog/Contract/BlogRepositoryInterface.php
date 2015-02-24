<?php namespace Anomaly\BlogsModule\Blog\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface BlogRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog\Contract
 */
interface BlogRepositoryInterface
{

    /**
     * Return all enabled blogs.
     *
     * @return EntryCollection
     */
    public function enabled();

    /**
     * Find a blog by it's slug.
     *
     * @param $slug
     * @return null|BlogInterface
     */
    public function findBySlug($slug);
}
