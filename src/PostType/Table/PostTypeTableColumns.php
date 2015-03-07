<?php namespace Anomaly\BlogModule\PostType\Table;

use Anomaly\Streams\Platform\Addon\Addon;

/**
 * Class PostTypeTableColumns
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\PostType\Table
 */
class PostTypeTableColumns
{

    /**
     * Handle the table columns.
     *
     * @param PostTypeTableBuilder $builder
     */
    public function handle(PostTypeTableBuilder $builder)
    {
        $builder->setColumns(
            [
                [
                    'heading' => 'module::post_type.name',
                    'value'   => function (Addon $entry) {
                        return trans($entry->getName());
                    }
                ],
                [
                    'heading' => 'module::post_type.description',
                    'value'   => function (Addon $entry) {
                        return trans($entry->getDescription());
                    }
                ]
            ]
        );
    }
}
