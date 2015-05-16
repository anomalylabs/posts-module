<?php namespace Anomaly\PostsModule\Type;

use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class TypeRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type
 */
class TypeRepository implements TypeRepositoryInterface
{

    /**
     * The type model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all types.
     *
     * @return EntryCollection
     */
    public function all()
    {
        return $this->model->all();
    }
}
