<?php namespace Anomaly\BlogModule\PostType\Table;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PostTypeTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\PostType\Table
 */
class PostTypeTableBuilder extends TableBuilder
{

    /**
     * Create a new PostTypeTableBuilder instance.
     *
     * @param Table               $table
     * @param ExtensionCollection $extensions
     */
    public function __construct(Table $table, ExtensionCollection $extensions)
    {
        $table->setEntries($extensions->search('anomaly.module.blog::post_type.*'));

        parent::__construct($table);
    }
}
