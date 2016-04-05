<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 04/04/2016
 * Time: 21:23
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class FamilleAdmin
 *
 * @package AppBundle\Admin
 */
class FamilleAdmin extends Admin
{
    /**
     * @param ListMapper $list
     */
    public function configureListFields(ListMapper $list)
    {
       $list
           ->addIdentifier('id')
           ->addIdentifier('nomFamille')
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
            ->add('nomFamille', 'text');
    }

}
