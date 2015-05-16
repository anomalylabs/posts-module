<?php namespace Anomaly\PostsModule\Post\Table;

use Anomaly\PostsModule\Post\Contract\PostInterface;

/**
 * Class PostTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Table
 */
class PostTableButtons
{

    /**
     * Handle the table buttons.
     *
     * @param PostTableBuilder $builder
     */
    public function handle(PostTableBuilder $builder)
    {
        $builder->setButtons(
            [
                [
                    'button' => 'edit',
                    'href'   => '/admin/posts/posts/edit/{entry.id}',
                ],
                [
                    'button' => 'view',
                    'target' => '_blank',
                    'href'   => function (PostInterface $entry) {
                        return $entry->getUrl();
                    }
                ]
            ]
        );
    }
}
