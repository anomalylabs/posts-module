<?php namespace Anomaly\BlogsModule\Category\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class CategoryTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category\Table
 */
class CategoryTableBuilder extends TableBuilder
{

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\BlogsModule\Category\CategoryModel';

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'title',
        'slug',
        'blog',
        'description'
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit'
    ];

}
