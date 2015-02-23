<?php namespace Anomaly\BlogsModule\Category;

use Anomaly\BlogsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Model\Blogs\BlogsCategoriesEntryModel;

/**
 * Class CategoryModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category
 */
class CategoryModel extends BlogsCategoriesEntryModel implements CategoryInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

}
