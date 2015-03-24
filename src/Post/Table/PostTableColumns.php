<?php namespace Anomaly\BlogModule\Post\Table;

use Anomaly\BlogModule\Post\Contract\PostInterface;

/**
 * Class PostTableColumns
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post\Table
 */
class PostTableColumns
{

    /**
     * Handle the table columns.
     *
     * @param PostTableBuilder $builder
     */
    public function handle(PostTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'title',
                [
                    'heading' => 'module::admin.post_type',
                    'value'   => function (PostInterface $entry) {
                        return trans($entry->getTypeName());
                    }
                ],
                'entry.enabled.icon',
                'entry.category.slug'
            ]
        );
    }
}
