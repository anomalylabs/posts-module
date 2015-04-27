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
     * The module's icon.
     *
     * @var string
     */
    protected $icon = 'rss';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'posts'      => [
            'buttons' => [
                [
                    'button'     => 'new',
                    'text'       => 'module::button.new_post',
                    'href'       => 'admin/blog/post_types/choose',
                    'attributes' => [
                        'data-modal' => 'small'
                    ]
                ]
            ]
        ],
        'categories' => [
            'buttons' => [
                'new' => 'module::button.new_category'
            ]
        ],
        'post_types' => [
            'buttons' => [
                'new' => 'module::button.new_type'
            ]
        ],
        'settings'
    ];

}
