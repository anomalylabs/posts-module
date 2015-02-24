<?php namespace Anomaly\BlogsModule\Category;

use Anomaly\BlogsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Blogs\BlogsCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts()
    {
        return $this->posts()->get();
    }

    /**
     * Return the posts relation.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('Anomaly\BlogsModule\Post\PostModel', 'category_id');
    }
}
