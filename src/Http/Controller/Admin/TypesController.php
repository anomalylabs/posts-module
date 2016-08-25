<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\PostsModule\Type\Form\TypeFormBuilder;
use Anomaly\PostsModule\Type\Table\TypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class TypesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypesController extends AdminController
{

    /**
     * Return an index of types.
     *
     * @param  TypeTableBuilder                           $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new type.
     *
     * @param  TypeFormBuilder                            $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TypeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing type.
     *
     * @param  TypeFormBuilder                            $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TypeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return a table of existing post type assignments.
     *
     * @param  AssignmentTableBuilder                     $table
     * @param  TypeRepositoryInterface                    $types
     * @param  BreadcrumbCollection                       $breadcrumbs
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(
        AssignmentTableBuilder $table,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id
    ) {
        $type = $types->find($id);

        $breadcrumbs->put($type->getName(), 'admin/posts/types/edit/' . $type->getId());
        $breadcrumbs->put('streams::breadcrumb.assignments', 'admin/posts/types/assignments/' . $type->getId());

        return $table
            ->setButtons(
                [
                    'edit' => [
                        'href' => '{request.path}/assignment/{entry.id}',
                    ],
                ]
            )
            ->setStream($type->getEntryStream())
            ->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param  FieldRepositoryInterface $fields
     * @return \Illuminate\View\View
     */
    public function choose(FieldRepositoryInterface $fields, TypeRepositoryInterface $types, $id)
    {
        $type = $types->find($id);

        return view(
            'module::admin/ajax/choose_field',
            [
                'fields' => $fields->findAllByNamespace('posts')->notAssignedTo($type->getEntryStream())->unlocked(),
                'id'     => $id,
            ]
        );
    }

    /**
     * Assign a field to a post type.
     *
     * @param  AssignmentFormBuilder                      $form
     * @param  TypeRepositoryInterface                    $types
     * @param  FieldRepositoryInterface                   $fields
     * @param                                             $id
     * @param                                             $field
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assign(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        $type = $types->find($id);

        return $form
            ->setStream($type->getEntryStream())
            ->setField($fields->find($field))
            ->render();
    }

    /**
     * Return a form for an existing post type field and assignment.
     *
     * @param  AssignmentFormBuilder                      $form
     * @param  TypeRepositoryInterface                    $types
     * @param  BreadcrumbCollection                       $breadcrumbs
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assignment(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id,
        $assignment
    ) {
        $type = $types->find($id);

        $breadcrumbs->put('streams::breadcrumb.assignments', 'admin/posts/types/assignments/' . $type->getId());

        return $form->render($assignment);
    }
}
