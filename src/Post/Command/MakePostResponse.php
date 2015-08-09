<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\PostAsset;
use Anomaly\PostsModule\Post\PostAuthorizer;
use Anomaly\PostsModule\Post\PostContent;
use Anomaly\PostsModule\Post\PostHttp;
use Anomaly\PostsModule\Post\PostLoader;
use Anomaly\PostsModule\Post\PostResponse;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class MakePostResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Command
 */
class MakePostResponse implements SelfHandling
{

    /**
     * The post instance.
     *
     * @var PostInterface
     */
    private $post;

    /**
     * Create a new MakePostResponse instance.
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
     * @param PostHttp       $http
     * @param PostAsset      $asset
     * @param PostLoader     $loader
     * @param PostContent    $content
     * @param PostResponse   $response
     * @param PostAuthorizer $authorizer
     */
    public function handle(
        PostHttp $http,
        PostAsset $asset,
        PostLoader $loader,
        PostContent $content,
        PostResponse $response,
        PostAuthorizer $authorizer
    ) {
        $authorizer->authorize($this->post);
        $loader->load($this->post);
        $asset->add($this->post);
        $content->make($this->post);
        $response->make($this->post);
        $http->cache($this->post);
    }
}
