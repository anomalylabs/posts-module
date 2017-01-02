<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class AssignmentsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param AssignmentTableBuilder    $table
     * @param StreamRepositoryInterface $streams
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table, StreamRepositoryInterface $streams)
    {
        return $table->setStream($streams->find($this->route->getParameter('stream')))->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @return \Illuminate\Contracts\View\View
     */
    public function choose(FieldRepositoryInterface $fields, StreamRepositoryInterface $streams)
    {
        $fields = $fields
            ->findAllByNamespace('posts')
            ->notAssignedTo($streams->find($this->route->getParameter('stream')))
            ->unlocked();

        return $this->view->make('anomaly.module.posts::admin/assignments/choose', compact('fields', 'type'));
    }

    /**
     * Create a new assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @param FieldRepositoryInterface  $fields
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        AssignmentFormBuilder $builder,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields
    ) {
        return $builder
            ->setField($fields->find($this->request->get('field')))
            ->setStream($streams->find($this->route->getParameter('stream')))
            ->render();
    }

    /**
     * Edit an existing assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AssignmentFormBuilder $builder, StreamRepositoryInterface $streams)
    {
        return $builder
            ->setStream($streams->find($this->route->getParameter('stream')))
            ->render($this->route->getParameter('id'));
    }
}
