<?php namespace Anomaly\BlogModule\Post\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PostTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post\Table
 */
class PostTableBuilder extends TableBuilder
{

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\BlogModule\Post\PostModel';

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

}
