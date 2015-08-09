<?php

return [
    [
        'tabs' => [
            'display'    => [
                'title'  => 'anomaly.module.posts::tab.display',
                'fields' => [
                    'theme_layout',
                    'posts_per_page',
                    'ttl'
                ]
            ],
            'permalinks' => [
                'title'  => 'anomaly.module.posts::tab.permalinks',
                'fields' => [
                    'permalink_structure',
                    'module_segment',
                    'category_segment',
                    'tag_segment'
                ]
            ]
        ]
    ]
];
