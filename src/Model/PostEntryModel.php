<?php namespace Anomaly\Streams\Module\Blog\Model;

use McCool\LaravelAutoPresenter\PresenterInterface;
use Streams\Core\Model\Blog\BlogPostsEntryModel;

class PostEntryModel extends BlogPostsEntryModel implements PresenterInterface
{
    /**
     * Get the presenter class.
     *
     * @return string The class path to the presenter.
     */
    public function getPresenter()
    {
        return 'Addon\Module\Blog\Presenter\PostEntryPresenter';
    }
}
