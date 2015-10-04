<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
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

        return implode(
            ' ',
            array_map(
                function ($label) use ($attributes) {
                    return $this->html->link(
                        implode(
                            '/',
                            [
                                $this->settings->get('anomaly.module.posts::module_segment', 'posts'),
                                $this->settings->get('anomaly.module.posts::tag_segment', 'tag'),
                                $label
                            ]
                        )
                        ,
                        $label,
                        $attributes
                    );
                },
                (array)$this->object->getTags()
            )
        );
    }

    /**
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return $this->html->link(
            'admin/posts/view/' . $this->object->getId(),
            $this->object->getTitle(),
            ['target' => '_blank']
        );
    }
}
