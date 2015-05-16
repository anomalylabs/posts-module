<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePosts_1_0_0_CreatePostsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePosts_1_0_0_CreatePostsFields extends Migration
{

    /**
     * The module fields.
     *
     * @var array
     */
    protected $fields = [
        'name'           => 'anomaly.field_type.text',
        'title'          => 'anomaly.field_type.text',
        'slug'           => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'title'
            ]
        ],
        'type'           => 'anomaly.field_type.text',
        'tags'           => 'anomaly.field_type.tags',
        'content'        => 'anomaly.field_type.wysiwyg',
        'excerpt'        => 'anomaly.field_type.textarea',
        'description'    => 'anomaly.field_type.textarea',
        'publish_at'     => 'anomaly.field_type.datetime',
        'allow_comments' => 'anomaly.field_type.boolean',
        'author'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UserModule\User\UserModel'
            ]
        ],
        'category'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PostsModule\Category\CategoryModel'
            ]
        ],
        'parent'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PostsModule\Category\CategoryModel'
            ]
        ],
        'enabled'        => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'text' => 'anomaly.module.posts::field.enabled.text'
            ]
        ]
    ];

}
