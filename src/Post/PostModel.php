<?php namespace Anomaly\BlogsModule\Post;

use Anomaly\BlogsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Model\Blogs\BlogsPostsEntryModel;

/**
 * Class PostModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post
 */
class PostModel extends BlogsPostsEntryModel implements PostInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

}
