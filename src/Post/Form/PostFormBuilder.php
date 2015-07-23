<?php namespace Anomaly\PostsModule\Post\Form;

use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PostFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form
 */
class PostFormBuilder extends FormBuilder
{

    /**
     * The post type.
     *
     * @var null|TypeInterface
     */
    protected $type = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'type',
        'entry',
        'str_id'
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getType() && !$this->getEntry()) {
            throw new \Exception('The $type parameter is required when creating a post.');
        }
    }

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();
        $type  = $this->getType();

        if (!$entry->type_id) {
            $entry->type_id = $type->getId();
        }

        if (!$entry->str_id) {
            $entry->str_id = str_random();
        }
    }
}
