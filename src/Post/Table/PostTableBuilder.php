<?php namespace Anomaly\BlogModule\Post\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Http\Request;

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
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'title',
        'category',
        'blog'
    ];

}
