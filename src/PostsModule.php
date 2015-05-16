<?php namespace Anomaly\PostsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PostsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule
 */
class PostsModule extends Module
{

    /**
     * The module's icon.
     *
     * @var string
     */
    protected $icon = 'newspaper';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'posts'      => [
            'buttons' => [
                'new_post' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/posts/ajax/choose_type',
                ]
            ]
        ],
        'categories' => [
            'buttons' => [
                'new_category'
            ]
        ],
        'types'      => [
            'buttons' => [
                'new_type'
            ]
        ],
        'fields'     => [
            'buttons' => [
                'new_fields'
            ]
        ],
        'settings'
    ];

}
