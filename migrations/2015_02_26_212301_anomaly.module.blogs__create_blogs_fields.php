<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogCreateBlogFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogCreateBlogFields extends Migration
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
                'related' => 'Anomaly\BlogModule\Blog\BlogModel'
            ]
        ],
        'category'      => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\BlogModule\Category\CategoryModel'
            ]
        ],
        'theme_layout'  => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'Anomaly\BlogModule\FieldType\ThemeLayout\ThemeLayoutOptions@handle'
            ]
        ]
    ];

}
