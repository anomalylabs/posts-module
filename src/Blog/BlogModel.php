<?php namespace Anomaly\BlogsModule\Blog;

use Anomaly\BlogsModule\Blog\Contract\BlogInterface;
use Anomaly\Streams\Platform\Model\Blogs\BlogsBlogsEntryModel;

/**
 * Class BlogModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog
 */
class BlogModel extends BlogsBlogsEntryModel implements BlogInterface
{

    /**
     * Cache the blogs.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

}
