<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\PostsModule\Type\Form\TypeFormBuilder;
use Anomaly\PostsModule\Type\Table\TypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class TypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller\Admin
 */
class TypesController extends AdminController
{

    /**
     * Return an index of types.
     *
     * @param TypeTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new type.
     *
     * @param TypeFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TypeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing type.
     *
     * @param TypeFormBuilder $form
     * @param                 $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TypeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return a table of existing post type assignments.
     *
     * @param AssignmentTableBuilder      $table
     * @param StreamRepositoryInterface   $streams
     * @param TypeRepositoryInterface     $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(
        AssignmentTableBuilder $table,
        StreamRepositoryInterface $streams,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id
    ) {
        $type = $types->find($id);

        $breadcrumbs->put('module::breadcrumb.fields', 'admin/posts/types/fields/' . $type->getId());

        return $table
            ->setButtons(
                [
                    'edit' => [
                        'href' => '{request.path}/assignment/{entry.id}'
                    ]
                ]
            )
            ->setOption('title', $type->getName() . ' fields')
            ->setOption('description', 'This is a list of assigned fields for the "' . $type->getName() . '" post type')
            ->setStream($streams->findBySlugAndNamespace($type->getSlug(), 'posts'))
            ->render();
    }

    public function assign(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        $type = $types->find($id);

        return $form
            ->setActions(
                [
                    'save' => [
                        'redirect' => 'admin/posts/types/fields/' . $id
                    ]
                ]
            )
            ->setStream($type->getEntryStream())
            ->setField($fields->find($field))
            ->render();
    }

    /**
     * Return a form for an existing post type field and assignment.
     *
     * @param AssignmentFormBuilder       $form
     * @param TypeRepositoryInterface     $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param                             $id
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

        $breadcrumbs->put('module::breadcrumb.fields', 'admin/posts/types/fields/' . $type->getId());

        return $form->render($assignment);
    }
}
