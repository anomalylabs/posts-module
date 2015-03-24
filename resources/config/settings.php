<?php

return [
    'permalink_structure' => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => '{year}/{month}/{day}/{post}',
        ]
    ],
    'module_base'         => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'blog'
        ]
    ],
    'category_base'       => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'category'
        ]
    ],
    'tag_base'            => [
        'type'   => 'anomaly.field_type.text',
        'config' => [
            'default_value' => 'tag'
        ]
    ]
];
