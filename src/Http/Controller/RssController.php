<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Config\Repository;
use Illuminate\Routing\ResponseFactory;

/**
 * Class RssController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
 */
class RssController extends PublicController
{

    public function all(PostRepositoryInterface $posts, ResponseFactory $response, Repository $config)
    {
        $config->set('app.debug', false);

        $response = $response
            ->view('module::posts/rss', ['posts' => $posts->getRecent()])
            /*->setTtl(3600)*/;

        $response->headers->set('content-type', 'text/xml');

        return $response;
    }
}
