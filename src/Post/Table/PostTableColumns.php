<?php namespace Anomaly\PostsModule\Post\Table;

use Anomaly\PostsModule\Post\Contract\PostInterface;

/**
 * Class PostTableColumns
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Table
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
                    'heading' => 'module::admin.type',
                    'value'   => function (PostInterface $entry) {
                        return trans($entry->getTypeName());
                    }
                ],
                'entry.category.title',
                'entry.enabled.icon'
            ]
        );
    }
}
