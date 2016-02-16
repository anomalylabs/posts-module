<?php namespace Anomaly\PostsModule\Post\Table;

use Illuminate\Translation\Translator;

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
     * @param Translator       $translator
     */
    public function handle(PostTableBuilder $builder, Translator $translator)
    {
        $builder->setColumns(
            [
                'title',
                'author',
                'category',
                'status' => [
                    'heading' => $translator->get('module::message.status'),
                    'value'   => 'entry.status_label'
                ]
            ]
        );
    }
}
