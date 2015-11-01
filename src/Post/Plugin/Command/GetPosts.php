<?php namespace Anomaly\PostsModule\Post\Plugin\Command;

use Anomaly\PostsModule\Post\PostCollection;
use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Support\Query;

/**
 * Class GetPosts
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Plugin\Command
 */
class GetPosts
{

    /**
     * The parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new GetPages command.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @param Query     $query
     * @param Decorator $decorator
     * @return PostCollection
     */
    public function handle(Query $query, Decorator $decorator)
    {
        $this->parameters['model'] = PostModel::class;

        array_set($this->parameters, 'order_by', array_get($this->parameters, 'order_by', ['publish_at', 'DESC']));

        $query = $query->build($this->parameters);

        if (array_has($this->parameters, 'enabled')) {
            $query->where('enabled', array_pull($this->parameters, 'enabled'));
        }

        if (array_has($this->parameters, 'featured')) {
            $query->where('featured', array_pull($this->parameters, 'featured'));
        }

        return $decorator->decorate($query->get());
    }
}
