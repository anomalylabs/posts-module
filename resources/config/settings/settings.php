<?php

return [
    'url_base' => [
        'required'    => false,
        'placeholder' => false,
        'env'         => 'POSTS_BASE',
        'bind'        => 'anomaly.module.posts::config.url_base',
        'type'        => 'anomaly.field_type.text',
        'config'      => [
            'filter_tags' => FILTER_VALIDATE_URL,
        ],
    ],
];