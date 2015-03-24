<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlog_1_0_0_CreateBlogFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlog_1_0_0_CreateBlogFields extends Migration
{

    /**
     * The module fields.
     *
     * @var array
     */
    protected $fields = [
        'slug'           => 'anomaly.field_type.slug',
        'name'           => 'anomaly.field_type.text',
        'title'          => 'anomaly.field_type.text',
        'type'           => 'anomaly.field_type.text',
        'tags'           => 'anomaly.field_type.tags',
        'content'        => 'anomaly.field_type.wysiwyg',
        'excerpt'        => 'anomaly.field_type.textarea',
        'description'    => 'anomaly.field_type.wysiwyg',
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
                'related' => 'Anomaly\BlogModule\Category\CategoryModel'
            ]
        ],
        'enabled'        => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'text' => 'anomaly.module.blog::field.enabled.text'
            ]
        ]
    ];

}
