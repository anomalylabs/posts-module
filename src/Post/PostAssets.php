<?php namespace Anomaly\PostsModule\Post;

use Anomaly\EditorFieldType\EditorFieldTypePresenter;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Asset\Asset;

/**
 * Class PostAssets
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostAssets
{

    /**
     * The asset instance.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * Create a new PostAssets instance.
     *
     * @param Asset $asset
     */
    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    /**
     * Add the page and page type assets.
     *
     * @param PostInterface $post
     * @throws \Exception
     */
    public function add(PostInterface $post)
    {
        /* @var EditorFieldTypePresenter $js */
        /* @var EditorFieldTypePresenter $css */
        $js  = $post->getFieldTypePresenter('js');
        $css = $post->getFieldTypePresenter('css');

        $this->asset->add('styles.css', $css->path());
        $this->asset->add('scripts.js', $js->path());

        $type = $post->getType();

        $js  = $type->getFieldTypePresenter('js');
        $css = $type->getFieldTypePresenter('css');

        $this->asset->add('styles.css', $css->path());
        $this->asset->add('scripts.js', $js->path());
    }
}
