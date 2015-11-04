<?php

return [
    \Anomaly\PostsModule\Post\PostModel::class => [
        'title'       => 'title',
        'keywords'    => 'meta_keywords',
        'description' => 'meta_description',
        'enabled'     => 'enabled',
        'view_path'   => 'entry.path',
        'edit_path'   => 'admin/posts/edit/{entry.id}'
    ]
];
