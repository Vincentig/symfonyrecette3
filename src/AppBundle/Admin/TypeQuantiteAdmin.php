<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 14/07/2016
 * Time: 19:36
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class TypeQuantiteAdmin extends Admin
{
    /**
     * configureFormFields
     *
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('type')

        ;
    }
}