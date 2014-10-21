<?php namespace Anomaly\Streams\Module\Blog\Installer;

use Streams\Core\Addon\Installer\ModuleInstallerAbstractAbstract;

class BlogModuleInstallerAbstract extends ModuleInstallerAbstractAbstract
{
    /**
     * The streams definitions.
     *
     * @var array
     */
    protected $streams = [
        'posts',
        'categories',
    ];

    /**
     * The stream fields definitions.
     *
     * @var array
     */
    protected $fields = [
        'title'        => [
            'type'  => 'text',
            'rules' => [
                'between:5,10',
            ]
        ],
        'slug'         => [
            'type'     => 'slug',
            'settings' => [
                'slug_field' => 'title',
            ],
        ],
        'status'       => [
            'type'     => 'select',
            'settings' => [
                'options' => [
                    'draft' => 'Draft',
                    'live'  => 'Live'
                ],
            ],
        ],
        'content'      => [
            'type' => 'wysiwyg',
        ],
        'introduction' => [
            'type' => 'wysiwyg',
        ],
        'category'     => [
            'type'     => 'relationship',
            'settings' => [
                'relation' => 'Addon\Module\Blog\Model\CategoryEntryModel',
            ],
        ],
        'keywords'     => [
            'type' => 'keywords',
        ],
        'post_date'    => [
            'type' => 'datetime',
        ],
        'comments'     => [
            'type'     => 'select',
            'settings' => [
                'options' => [
                    'disabled' => 'Disabled',
                    'enabled'  => 'Enabled',
                ],
            ],
        ],
    ];
}
