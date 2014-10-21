<?php namespace Anomaly\Streams\Module\Blog\Controller;

use Streams\Core\Controller\PublicController;

class PostsController extends PublicController
{
    public function index()
    {
        return \View::make('module.blog::index');
    }
}