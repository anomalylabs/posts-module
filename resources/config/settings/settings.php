<?php

return [
    'permalink_structure' => [
        'type'     => 'anomaly.field_type.tags',
        'required' => true,
        'config'   => [
            'allow_creating_tags' => false,
            'options'             => [
                'year',
                'month',
                'day',
                'post'
            ],
            'default_value'       => [
                'year',
                'month',
                'day',
                'post'
            ]
        ]
    ],
    'module_segment'      => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 'posts'
        ]
    ],
    'category_segment'    => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 'category'
        ]
    ],
    'tag_segment'         => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => 'tag'
        ]
    ],
    'posts_per_page'      => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 15,
            'min'           => 1
        ]
    ]
];
