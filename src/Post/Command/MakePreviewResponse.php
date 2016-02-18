<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\PostAssets;
use Anomaly\PostsModule\Post\PostContent;
use Anomaly\PostsModule\Post\PostLoader;
use Anomaly\PostsModule\Post\PostResponse;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class MakePreviewResponse
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Post\Command
 */
class MakePreviewResponse implements SelfHandling
{

    /**
     * The post instance.
     *
     * @var PostInterface
     */
    private $post;

    /**
     * Create a new MakePreviewResponse instance.
     *
     * @param PostInterface $post
     */
    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the command
     *
     * @param PostAssets   $asset
     * @param PostLoader   $loader
     * @param PostContent  $content
     * @param PostResponse $response
     */
    public function handle(
        PostAssets $asset,
        PostLoader $loader,
        PostContent $content,
        PostResponse $response
    ) {
        $loader->load($this->post);
        $asset->add($this->post);
        $content->make($this->post);
        $response->make($this->post);
    }
}
