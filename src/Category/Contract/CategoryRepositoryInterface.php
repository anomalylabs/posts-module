<?php namespace Anomaly\BlogsModule\Category\Contract;

/**
 * Interface CategoryRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category\Contract
 */
interface CategoryRepositoryInterface
{

    /**
     * Find a category by it's related
     * blog and it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug);
}
