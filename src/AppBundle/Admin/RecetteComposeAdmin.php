<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class EndroitAdmin
 *
 * @package AppBundle\Admin
 */
class RecetteComposeAdmin extends AbstractAdmin
{
    /**
     * configureDatagridFilters
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    /**
     * configureListFields
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {

    }

    /**
     * configureFormFields
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre')
            ->add('qualiteAvantIngredient')
            ->add('ingredient', 'sonata_type_model')
            ->add('qualiteApresIngredient')
            ->add('qualiteAvantUniteMesure')
            ->add('quantiteUniteMesure')
            ->add('qualiteApresUniteMesure')
            ->add('uniteMesure', 'sonata_type_model', array( 'required' => false))
        ;

//        $objet = $this->getSubject();
        $formMapper->getFormBuilder()->addEventListener(FormEvents::PRE_SET_DATA,
            function (FormEvent $event)  {
//                ldd($event);
                //$document = $subject->getDocument();


            });
    }

    /**
     * configureShowFields
     *
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {

    }


}
