<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogsCreateBlogsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogsCreateBlogsFields extends Migration
{

    /**
     * The module fields.
     *
     * @var array
     */
    protected $fields = [
        'slug'          => 'anomaly.field_type.slug',
        'name'          => 'anomaly.field_type.text',
        'title'         => 'anomaly.field_type.text',
        'tags'          => 'anomaly.field_type.tags',
        'description'   => 'anomaly.field_type.textarea',
        'allowed_roles' => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'related' => 'Anomaly\UsersModule\Role\RoleModel'
            ]
        ],
        'blog'          => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\BlogsModule\Blog\BlogModel'
            ]
        ],
        'category'      => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\BlogsModule\Category\CategoryModel'
            ]
        ],
        'theme_layout'  => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'Anomaly\BlogsModule\FieldType\ThemeLayout\ThemeLayoutOptions@handle'
            ]
        ]
    ];

}
