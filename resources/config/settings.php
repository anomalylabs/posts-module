<?php

return [
    'module_title'        => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'Posts',
        ]
    ],
    'permalink_structure' => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => '{year}/{month}/{day}/{post}',
        ]
    ],
    'module_segment'      => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'posts'
        ]
    ],
    'category_segment'    => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'category'
        ]
    ],
    'tag_segment'         => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'tag'
        ]
    ]
];
