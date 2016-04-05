<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 05/04/2016
 * Time: 22:03
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategorieAdmin extends Admin
{
    /**
* @param ListMapper $list
*/
    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('nomCategorie')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('nomCategorie', 'text');
    }
}
