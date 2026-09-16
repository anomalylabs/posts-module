<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Post\Form\Command\AddEntryFormFromPost;
use Anomaly\PostsModule\Post\Form\Command\AddEntryFormFromRequest;
use Anomaly\PostsModule\Post\Form\Command\AddPostFormFromPost;
use Anomaly\PostsModule\Post\Form\Command\AddPostFormFromRequest;
use Anomaly\PostsModule\Post\Form\PostEntryFormBuilder;
use Anomaly\PostsModule\Post\Table\PostTableBuilder;
use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Routing\Redirector;

/**
 * Class PostsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostsController extends AdminController
{

    /**
     * Return a tree of existing posts.
     *
     * @param PostTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PostTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the modal for choosing a post type.
     *
     * @param  TypeRepositoryInterface $types
     * @param  Authorizer $authorizer
     * @return \Illuminate\View\View
     */
    public function choose(TypeRepositoryInterface $types, Authorizer $authorizer)
    {
        if (!$authorizer->authorize('anomaly.module.posts::posts.write')) {
            abort(403);
        }

        return $this->view->make('module::admin/posts/choose', ['types' => $types->all()]);
    }

    /**
     * Return the modal for changing a post type.
     *
     * @param  TypeRepositoryInterface $types
     * @param  PostRepositoryInterface $posts
     * @param  Authorizer $authorizer
     * @param $id
     * @return \Illuminate\View\View
     */
    public function change(
        TypeRepositoryInterface $types,
        PostRepositoryInterface $posts,
        Authorizer $authorizer,
        $id
    ) {
        if (!$authorizer->authorize('anomaly.module.posts::posts.write')) {
            abort(403);
        }

        if (!$posts->find($id)) {
            abort(404);
        }

        return $this->view->make('module::admin/posts/change', ['types' => $types->all(), 'post' => $id]);
    }

    /**
     * Return the form for creating a new post.
     *
     * @param  PostEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PostEntryFormBuilder $form)
    {
        dispatch_sync(new AddEntryFormFromRequest($form));
        dispatch_sync(new AddPostFormFromRequest($form));

        return $form->render();
    }

    /**
     * Return the form for editing an existing post.
     *
     * @param  PostRepositoryInterface $posts
     * @param  PostEntryFormBuilder $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PostRepositoryInterface $posts, PostEntryFormBuilder $form, $id)
    {
        /* @var PostInterface $post */
        $post = $posts->find($id);

        dispatch_sync(new AddEntryFormFromPost($form, $post));
        dispatch_sync(new AddPostFormFromPost($form, $post));

        return $form->render($post);
    }

    /**
     * Redirect to a post's URL.
     *
     * @param  PostRepositoryInterface $posts
     * @param  Redirector $redirect
     * @param  Authorizer $authorizer
     * @param                                    $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(PostRepositoryInterface $posts, Redirector $redirect, Authorizer $authorizer, $id)
    {
        if (!$authorizer->authorizeAny(
            [
                'anomaly.module.posts::posts.read',
                'anomaly.module.posts::posts.write',
            ],
            null,
            true
        )) {
            abort(403);
        }

        /* @var PostInterface $post */
        if (!$post = $posts->find($id)) {
            abort(404);
        }

        if (!$post->isLive()) {

            if (!$authorizer->authorize('anomaly.module.posts::posts.preview')) {
                abort(403);
            }

            return $redirect->to($post->route('preview'));
        }

        return $redirect->to($post->route('view'));
    }

    /**
     * Delete a post and go back.
     *
     * @param  PostRepositoryInterface $posts
     * @param  Authorizer $authorizer
     * @param                                    $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(PostRepositoryInterface $posts, Authorizer $authorizer, $id)
    {
        if (!hash_equals((string)csrf_token(), (string)$this->request->get('_token'))) {

            $this->messages->error('streams::message.csrf_token_mismatch');

            return $this->redirect->back();
        }

        if (!$authorizer->authorize('anomaly.module.posts::posts.delete')) {

            $this->messages->error('streams::message.access_denied');

            return $this->redirect->back();
        }

        if (!$post = $posts->find($id)) {
            abort(404);
        }

        $posts->delete($post);

        return redirect()->back();
    }
}
