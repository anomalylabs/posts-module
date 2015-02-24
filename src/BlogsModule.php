<?php namespace Anomaly\BlogsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BlogsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule
 */
class BlogsModule extends Module
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
        'blogs'      => [
            'buttons' => [
                'create'
            ]
        ],
        'posts'      => [
            'buttons' => [
                [
                    'button'     => 'create',
                    'href'       => 'admin/blogs/choose',
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
        ]
    ];

}
