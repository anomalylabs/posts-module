<?php namespace Addon\Module\Blog\Installer;

use Addon\Module\Settings\Installer\SettingsInstallerAbstract;

class BlogSettingsInstaller extends SettingsInstallerAbstract
{
    /**
     * The settings definitions.
     *
     * @var array
     */
    protected $settings = [
        'test_setting' => [
            'type'  => 'text',
            'rules' => [
                'between:5,10',
            ]
        ],
        'test_options' => [
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
