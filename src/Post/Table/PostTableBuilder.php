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
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'author',
        'category',
        'enabled'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.edit_link',
        'author',
        'category',
        'entry.enabled.toggle'
    ];

    /**
     * The tree buttons.
     *
     * @var array
     */
    protected $buttons = [
        'view'
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'order_by' => [
            'publish_at' => 'DESC'
        ]
    ];

}
