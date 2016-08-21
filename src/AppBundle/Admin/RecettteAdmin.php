<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/06/2016
 * Time: 22:42
 */

namespace AppBundle\Admin;

use AppBundle\services\RecetteManager;
use blackknight467\StarRatingBundle\Form\RatingType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class RecettteAdmin extends AbstractAdmin
{
    /**
     * @var RecetteManager
     */
    protected $recetteManager;

    public function setRecetteManager($recetteManager)
    {
        $this->recetteManager = $recetteManager;
    }

    public function configureListFields(ListMapper $list)
    {
       $list
           ->addIdentifier(
               'nom',
               'text',
               array(

               ))
           ;
    }

    public function configureFormFields(FormMapper $form)
    {
       $form
           ->with('partie 1', [
               'class' => 'col-md-6'
           ])
           ->add('numero', IntegerType::class, [
               'required'=>false,
               'label'=> 'admin.recette.label.number',
           ])
           ->add('nom', TextType::class, [
               'label' => 'admin.recette.label.title',
           ])
           ->add('categorie', EntityType::class, [
               'required' => false,
               'class' => 'AppBundle:Categorie',
               'label' => 'admin.recette.label.category',
           ])
           ->add('famille', EntityType::class ,[
               'class' => 'AppBundle:Famille',
               'label' => 'admin.recette.label.family',
           ])
           ->add('pays', ModelType::class, [
               'required'=>false,
               'label' => 'admin.recette.label.country',
           ])
           ->add('tempsRealisation', RatingType::class, [
               'label' => 'admin.recette.label.realisation_time',
           ])
           ->add('difficulte', RatingType::class, [
               'label' => 'admin.recette.label.dificulty',
           ])
           ->add('cout', RatingType::class, [
               'label' => 'admin.recette.label.cost',
           ])
           ->add('quantiteType', ModelType::class, [
               'label' => 'admin.recette.label.quantity_type',
           ])
           ->add('quantiteMin', IntegerType::class, [
               'label' => 'admin.recette.label.quantity_min',
           ])
           ->add('quantiteMax', IntegerType::class, [
               'required' => false,
               'label' => 'admin.recette.label.quantity_max',
           ])
           ->add('tempsCuissonMin', TimeType::class, [
               'label' => 'admin.recette.label.cooking_time_min',
           ])
           ->add('tempsCuissonMax', TimeType::class, [
                'label' => 'admin.recette.label.cooking_time_max',
            ])
           ->add('notreTruc', TextareaType::class, [
               'label' => 'admin.recette.label.our_thing',
           ])
           ->add('boissons', EntityType::class, [
               'class' => 'AppBundle:Boisson',
               'label' => 'admin.recette.label.drink',
               'multiple' => true,
           ])
           ->end()

           ->with('partie 2', array('class' => 'col-md-6'))
           ->add(
               'etapes',
               'sonata_type_collection',
               [
                   'by_reference' => false,
                   'label' => 'admin.recette.label.step',
               ],
               [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'sortable' => 'numero',
               ]
           )
           ->add(
               'recetteEndroits',
               'sonata_type_collection',
               [
                   'by_reference' => false,
                   'label' => 'admin.recette.label.places',
               ],
               [
                   'edit' => 'inline',
                   'inline' => 'table',
                   'required' => false,
              ]
            )


           ->end()

           ->with('partie 3', array('class' => 'col-md-12'))
           ->add('recetteComposes','sonata_type_collection',
               [
                   'by_reference' => false,
                   'label' => 'admin.recette.label.compose',
               ],
               [
                    'edit' => 'inline',
                    'inline' => 'table',
                ]
           )
           ->end()
           ->with('partie 4', array('class' => 'col-md-12'))
           ->add('image', MediaType::class, [
               'provider' => 'sonata.media.provider.image',
               'context' => 'default'
           ]);

       ;

        $form->getFormBuilder()->addEventListener(FormEvents::PRE_SUBMIT, array($this,'onPreSubmit'));
    }

    public function onPreSubmit(FormEvent $event)
    {
        if($event->getData()['numero'] == '' && $event->getData()['famille'] && $event->getData()['categorie']) {
            $numero = $this->recetteManager->getLastNumberWithFamilyAndCategory( $event->getData()['famille'], $event->getData()['categorie']);

            $event->setData(array_merge($event->getData(), ['numero'=>$numero]));
        }
    }

    public function validate(ErrorElement $errorElement,  $media)
    {
        $errorElement
            ->with('image.binaryContent')
            ->assertFile(array('maxSize' => '3000000'))
            ->end()
            ;
    }
}
