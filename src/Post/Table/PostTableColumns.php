<?php namespace Anomaly\PostsModule\Post\Table;

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
     * Handle the columns.
     *
     * @param PostTableBuilder $builder
     */
    public function handle(PostTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'title',
                'author',
                'category',
                'status' => [
                    'heading' => 'anomaly.module.posts::message.status',
                    'value'   => 'entry.status_label'
                ]
            ]
        );
    }
}
