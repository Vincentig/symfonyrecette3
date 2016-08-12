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
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
           ->with('partie 1', array('class' => 'col-md-6'))
           ->add('numero', IntegerType::class, ['required'=>false, 'label'=> 'admin.recette.label.number'])
           ->add(
               'nom',
               TextType::class,
               array(
                   'label' => 'admin.recette.label.name'
               )
           )
           ->add('categorie', EntityType::class, array(
               'attr' => array(
                   'class' => 'col-md-6'
               ),
               'class' => 'AppBundle:Categorie',
           ))
           ->add('famille', null, array('attr' => array('class' => 'col-md-6')))
           ->add('pays', 'sonata_type_model', array('required'=>false))
           ->add('tempsRealisation', RatingType::class)
           ->add('difficulte', RatingType::class)
           ->add('cout', RatingType::class)
           ->add('quantiteMin')
           ->add('quantiteMax')
           ->add('quantiteType', 'sonata_type_model')

           ->add('tempsCuissonMin')
           ->add('tempsCuissonMax')
           ->add('notreTruc')
           ->add('boissons')
           ->end()

           ->with('partie 2', array('class' => 'col-md-6'))
           ->add('etapes', 'sonata_type_collection', array('by_reference' => false), array(
               'edit' => 'inline',
               'inline' => 'table',
               'sortable' => 'numero'
           ))
           ->add('recetteEndroits','sonata_type_collection', array('by_reference' => false), array(
               'edit' => 'inline',
               'inline' => 'table',
               'required' => false,
           ))


           ->end()

           ->with('partie 3', array('class' => 'col-md-12'))
           ->add('recetteComposes','sonata_type_collection', array('by_reference' => false), array(
                'edit' => 'inline',
                'inline' => 'table',
            ))
           ->end()
           ->with('partie 4', array('class' => 'col-md-12'))
           ->add('image', 'sonata_media_type', array(
               'provider' => 'sonata.media.provider.image',
               'context' => 'default'
           ), array()
           );

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
