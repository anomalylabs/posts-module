<?php namespace Anomaly\PostsModule\Post\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PostTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Table
 */
class PostTableBuilder extends TableBuilder
{

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\PostsModule\Post\PostModel';

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

}
