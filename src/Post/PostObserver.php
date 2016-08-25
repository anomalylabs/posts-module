<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class PostObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|PostInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        if (!$entry->getStrId()) {
            $entry->setAttribute('str_id', str_random());
        }

        parent::creating($entry);
    }
}
