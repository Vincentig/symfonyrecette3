<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('nombre', IntegerType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.nombre',
            ])
            ->add('qualiteAvantIngredient', TextType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.qualiteavantingredient',

            ])
            ->add('ingredient', ModelType::class, [
                'label' => 'admin.recette_compose.label.ingredient',
            ])
            ->add('qualiteApresIngredient', TextType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.qualiteapresingredient',

            ])
            ->add('qualiteAvantUniteMesure', TextType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.qualiteavantunitemesure',

            ])
            ->add('quantiteUniteMesure', IntegerType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.quantiteunitemesure',

            ])
            ->add('qualiteApresUniteMesure', TextType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.qualiteapresunitemesure',

            ])
            ->add('uniteMesure', ModelType::class, [
                'required' => false,
                'label' => 'admin.recette_compose.label.unitemesure',
            ])
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
