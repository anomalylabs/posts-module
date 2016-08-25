<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Field\Table\FieldTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class FieldsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FieldsController extends AdminController
{

    /**
     * Return an index of existing post type fields.
     *
     * @param  FieldTableBuilder                          $table
     * @param  PostModel                                  $model
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FieldTableBuilder $table, PostModel $model)
    {
        $table->setStream($model->getStream());

        return $table->render();
    }

    /**
     * Return the modal for choosing a field type.
     *
     * @param  FieldTypeCollection   $fieldTypes
     * @return \Illuminate\View\View
     */
    public function choose(FieldTypeCollection $fieldTypes)
    {
        return view('module::admin/ajax/choose_field_type', ['field_types' => $fieldTypes->all()]);
    }

    /**
     * Return the form for a new field.
     *
     * @param  FieldFormBuilder                           $form
     * @param  StreamRepositoryInterface                  $streams
     * @param  FieldTypeCollection                        $fieldTypes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FieldFormBuilder $form, StreamRepositoryInterface $streams, FieldTypeCollection $fieldTypes)
    {
        $form
            ->setStream($streams->findBySlugAndNamespace('posts', 'posts'))
            ->setFieldType($fieldTypes->get($_GET['field_type']));

        return $form->render();
    }

    /**
     * Return the form for an existing field.
     *
     * @param  FieldFormBuilder                           $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FieldFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
