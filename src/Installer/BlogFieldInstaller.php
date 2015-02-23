<?php namespace Anomaly\BlogModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class BlogFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Installer
 */
class BlogFieldInstaller extends FieldInstaller
{

    /**
     * Field definitions.
     *
     * @var array
     */
    protected $fields = [
        'slug'        => 'anomaly.field_type.slug',
        'name'        => 'anomaly.field_type.text',
        'title'       => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
    ];

}
