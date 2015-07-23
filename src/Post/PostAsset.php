<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Asset\Asset;

class PostAsset
{

    /**
     * The asset instance.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * Create a new PostAsset instance.
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
        $this->asset->add('styles.css', $post->getCssPath());
        $this->asset->add('scripts.js', $post->getJsPath());

        $type = $post->getType();

        $this->asset->add('styles.css', $type->getCssPath());
        $this->asset->add('scripts.js', $type->getJsPath());
    }
}
