<?php namespace Anomaly\Streams\Module\Blog\Controller\Admin;

use Addon\Module\Blog\Model\PostEntryModel;
use Streams\Core\Controller\AdminController;
use Streams\Core\Stream\Model\StreamModel;
use Streams\Core\Ui\FormUi;
use Streams\Core\Ui\TableUi;

class PostsController extends AdminController
{
    public function index()
    {
        $table = new TableUi();
        $posts = new PostEntryModel();

        return $table
            ->make($posts)
            ->setColumns(
                array(
                    'id',
                    'title',
                    'slug',
                )
            )
            ->render();
    }

    /**
     * Display a table of all modules.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form  = new FormUi();
        $posts = new PostEntryModel();

        return $form
            ->make($posts)
            ->addSection(
                [
                    'fields' => [
                        'title',
                        'slug'
                    ]
                ]
            )
            ->addAction(
                [
                    'value' => 'foo',
                    'class' => 'btn btn-info',
                    'text'  => 'Save',
                ]
            )
            ->render();
    }
}