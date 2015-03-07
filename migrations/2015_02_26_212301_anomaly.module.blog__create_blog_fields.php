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
        'slug'        => 'anomaly.field_type.slug',
        'name'        => 'anomaly.field_type.text',
        'title'       => 'anomaly.field_type.text',
        'type'        => 'anomaly.field_type.text',
        'tags'        => 'anomaly.field_type.tags',
        'content'     => 'anomaly.field_type.wysiwyg',
        'description' => 'anomaly.field_type.wysiwyg',
        'category'    => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\BlogModule\Category\CategoryModel'
            ]
        ],
        'status'      => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    'draft'   => 'anomaly.module.blog::field.status.option.draft',
                    'pending' => 'anomaly.module.blog::field.status.option.pending',
                    'live'    => 'anomaly.module.blog::field.status.option.live',
                ]
            ]
        ]
    ];

}
