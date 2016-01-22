<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Post\Command\AddArchiveBreadcrumb;
use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class ArchiveController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
 */
class ArchiveController extends PublicController
{

    /**
     * Return an index of archived posts.
     *
     * @param PostRepositoryInterface $posts
     * @param                         $year
     * @param null                    $month
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PostRepositoryInterface $posts, $year, $month = null)
    {
        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddArchiveBreadcrumb());

        $posts = $posts->findManyByDate($year, $month);

        return view('anomaly.module.posts::archive/index', compact('year', 'month', 'posts'));
    }
}
