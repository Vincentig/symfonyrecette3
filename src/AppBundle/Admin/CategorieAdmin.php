<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 05/04/2016
 * Time: 22:03
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CategorieAdmin extends AbstractAdmin
{
    /**
* @param ListMapper $list
*/
    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('nom')
            ->addIdentifier('icon')
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
            ->add('nom')
            ->add('icon')
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
            ->add('nom', 'text')
            ->add('icon', 'text');
    }
}
