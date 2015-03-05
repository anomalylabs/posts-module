<?php namespace Anomaly\BlogModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BlogModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule
 */
class BlogModule extends Module
{

    /**
     * The module's navigation group.
     *
     * @var null
     */
    protected $navigation = 'streams::navigation.content';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'blog'      => [
            'buttons' => [
                'create'
            ]
        ],
        'posts'      => [
            'buttons' => [
                [
                    'button'     => 'create',
                    'href'       => 'admin/blog/choose',
                    'attributes' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal'
                    ]
                ]
            ]
        ],
        'categories' => [
            'buttons' => [
                'create'
            ]
        ],
        'post_types' => [
            'buttons' => [
                'create'
            ]
        ]
    ];

}
