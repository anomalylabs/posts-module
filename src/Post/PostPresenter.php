<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Decorator;
use Collective\Html\HtmlBuilder;

/**
 * Class PostPresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostPresenter extends EntryPresenter
{

    /**
     * The HTML builder.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The decorated post.
     *
     * @var PostInterface
     */
    protected $object;

    /**
     * The setting repository.
     *
     * @var SettingRepositoryInterface
     */
    private $settings;

    /**
     * Create a new PostPresenter instance.
     *
     * @param HtmlBuilder                $html
     * @param SettingRepositoryInterface $settings
     * @param                            $object
     */
    public function __construct(HtmlBuilder $html, SettingRepositoryInterface $settings, $object)
    {
        $this->html     = $html;
        $this->settings = $settings;

        parent::__construct($object);
    }

    /**
     * Return the tag links.
     *
     * @param array $attributes
     * @return string
     */
    public function tagLinks(array $attributes = [])
    {
        array_set($attributes, 'class', array_get($attributes, 'class', 'label label-default'));

        return array_map(
            function ($label) use ($attributes) {
                return $this->html->link(
                    implode(
                        '/',
                        [
                            $this->settings->value('anomaly.module.posts::module_segment', 'posts'),
                            $this->settings->value('anomaly.module.posts::tag_segment', 'tag'),
                            $label
                        ]
                    )
                    ,
                    $label,
                    $attributes
                );
            },
            (array)$this->object->getTags()
        );
    }

    /**
     * Catch calls to fields on
     * the page's related entry.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry->hasField($key)) {
            return (New Decorator())->decorate($entry)->{$key};
        }

        return parent::__get($key);
    }
}
