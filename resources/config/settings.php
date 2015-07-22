<?php

return [
    'permalink_structure' => [
        'type'     => 'anomaly.field_type.text',
        'required' => true,
        'config'   => [
            'default_value' => '{year}/{month}/{day}/{post}'
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
    ]
];
