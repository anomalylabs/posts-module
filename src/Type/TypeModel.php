<?php namespace Anomaly\PostsModule\Type;

use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Posts\PostsTypesEntryModel;

/**
 * Class TypeModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type
 */
class TypeModel extends PostsTypesEntryModel implements TypeInterface
{

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->desciption;
    }
}
