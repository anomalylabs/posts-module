<?php

return [
    'name'             => [
        'name'         => 'Name',
        'instructions' => 'Enter an easily identifiable name.'
    ],
    'title'            => [
        'name'         => 'Title',
        'instructions' => 'Enter the title of the post.'
    ],
    'slug'             => [
        'name'         => 'Slug',
        'instructions' => 'The slug is used in building the entry\'s URL.'
    ],
    'description'      => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe the entry.'
    ],
    'summary'          => [
        'name'         => 'Summary',
        'instructions' => 'Enter a brief summary for the post.'
    ],
    'category'         => [
        'name'         => 'Category',
        'instructions' => 'Specify the category this post displays in.'
    ],
    'meta_title'       => [
        'name'         => 'Meta Title',
        'instructions' => 'Enter the post\'s SEO title. The post\'s title will be used by default.'
    ],
    'meta_description' => [
        'name'         => 'Meta Description',
        'instructions' => 'Enter the post\'s SEO description.'
    ],
    'meta_keywords'    => [
        'name'         => 'Meta Keywords',
        'instructions' => 'Enter the post\'s SEO keywords. Use ONLY as many as makes sense.'
    ],
    'theme_layout'     => [
        'name'         => 'Theme Layout',
        'instructions' => 'The theme layout will be used to wrap the post content.'
    ],
    'layout'           => [
        'name'         => 'Layout',
        'instructions' => 'The layout will be used to display the post content.'
    ],
    'tags'             => [
        'name'         => 'Tags',
        'instructions' => 'Add organizational tags (separated by spaces).'
    ],
    'enabled'          => [
        'name'         => 'Enabled',
        'label'        => 'Is this post enabled?',
        'instructions' => 'This post will not display on your website until made enabled and the "publish at" date is satisfied.'
    ],
    'featured'         => [
        'name'         => 'Featured',
        'label'        => 'Is this a featured post?',
        'instructions' => 'Featured posts can be used to bring attention to specific posts.'
    ],
    'publish_at'       => [
        'name'         => 'Publish At',
        'instructions' => 'Set the date/time when you want the post to publish itself.'
    ],
    'author'           => [
        'name'         => 'Author',
        'instructions' => 'Set the publicly displayed author.'
    ],
    'ttl'              => [
        'label'        => 'Time to live (TTL)',
        'instructions' => 'How long (in minutes) do you want to cache the post before serving fresh content?'
    ],
    'status'           => [
        'name'   => 'Status',
        'option' => [
            'live'      => 'Live',
            'draft'     => 'Draft',
            'scheduled' => 'Scheduled'
        ]
    ]
];
