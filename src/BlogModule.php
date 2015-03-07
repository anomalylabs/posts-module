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
        'posts'      => [
            'buttons' => [
                'new_modal' => [
                    'text' => 'module::button.new_post',
                    'href' => 'admin/blog/post_types/choose'
                ]
            ]
        ],
        'categories' => [
            'buttons' => [
                'new' => 'module::button.new_category'
            ]
        ],
        'post_types',
        'settings'
    ];

}
