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
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class FamilleAdmin
 *
 * @package AppBundle\Admin
 */
class FamilleAdmin extends Admin
{
    /**
     * configureListFields
     *
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

    /**
     * configureShowFields
     *
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('nomFamille')
        ;
    }

    /**
     * configureFormFields
     *
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('nomFamille', 'text');
    }
}
