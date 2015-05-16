<?php namespace Anomaly\PostsModule\Post;

use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class PostObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostObserver extends EntryObserver
{

    /**
     * Fired just before creating the post.
     *
     * @param EloquentModel $model
     */
    public function creating(EloquentModel $model)
    {
        $model->type = app('request')->segment(5);

        parent::creating($model);
    }
}
