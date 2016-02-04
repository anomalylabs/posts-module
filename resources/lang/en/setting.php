<?php

return [
    'permalink_structure' => [
        'label'        => 'Permalink Structure',
        'instructions' => 'Customize the URL structure for your permalinks and archives. This can improve the aesthetics, usability, and forward-compatibility of your links.'
    ],
    'module_segment'      => [
        'label'        => 'Module Segment',
        'instructions' => 'Define a custom segment URI for the the Posts module.'
    ],
    'enable_index'      => [
        'label'        => 'Enable the module\'s index route',
        'instructions' => 'When enabled an index of all post entries will be displayed when visiting the module segment URL.'
    ],
    'category_segment'    => [
        'label'        => 'Category Segment',
        'instructions' => 'Define a custom category segment URI for the category URLs.'
    ],
    'tag_segment'         => [
        'label'        => 'Tag Segment',
        'instructions' => 'Define a custom tag segment for the tag URLs.'
    ],
    'posts_per_page'      => [
        'label'        => 'Posts Per Page',
        'instructions' => 'Define how many posts to display per page on your website.'
    ],
    'ttl'                 => [
        'label'        => 'Time to live (TTL)',
        'instructions' => 'How long (in minutes) do you want to cache posts before before serving fresh content?'
    ]
];
