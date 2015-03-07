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
                'new' => 'module::button.new_post'
            ]
        ],
        'categories' => [
            'buttons' => [
                'new' => 'module::button.new_category'
            ]
        ],
        'fields' => [
            'buttons' => [
                'new' => 'module::button.new_field'
            ]
        ],
        'settings'
    ];

}
