<?php namespace Anomaly\PostsModule\Type\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface TypeRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type\Contract
 */
interface TypeRepositoryInterface
{

    /**
     * Return all types.
     *
     * @return EntryCollection
     */
    public function all();
}
