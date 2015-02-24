<?php namespace Anomaly\BlogsModule\Post\Table;

use Anomaly\BlogsModule\Post\Contract\PostInterface;

/**
 * Class PostTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post\Table
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
                    'href'   => '/admin/blogs/posts/edit/{entry.blog_id}/{entry.id}',
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
