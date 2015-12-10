<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Type\Command\AddTypeMetaTitle;
use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class TypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
 */
class TypesController extends PublicController
{

    /**
     * Return an index of type posts.
     *
     * @param TypeRepositoryInterface     $categories
     * @param PostRepositoryInterface     $posts
     * @param                             $type
     * @return \Illuminate\View\View
     */
    public function index(TypeRepositoryInterface $categories, PostRepositoryInterface $posts, $type)
    {
        if (!$type = $categories->findBySlug($type)) {
            abort(404);
        }

        $this->dispatch(new AddTypeMetaTitle($type));

        $posts = $posts->findManyByType($type);

        return view('anomaly.module.posts::types/index', compact('type', 'posts'));
    }
}
