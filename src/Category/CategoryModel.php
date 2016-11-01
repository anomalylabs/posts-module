<?php namespace Anomaly\PostsModule\Category;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoryModel extends PostsCategoriesEntryModel implements CategoryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Return the posts relation.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('Anomaly\PostsModule\Post\PostModel', 'category_id');
    }
}
