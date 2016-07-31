<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/06/2016
 * Time: 22:42
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RecettteAdmin extends Admin
{
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
           ->add(
               'nom',
               null,
               array(

               ),
               array(

               )
           )
           ->add('categorie', null, array('attr' => array('class' => 'col-md-6')))
           ->add('famille', null, array('attr' => array('class' => 'col-md-6')))
           ->add('pays', 'sonata_type_model')
           ->add('tempsRealisation')
           ->add('difficulte')
           ->add('cout')
           ->add('quantiteMin')
           ->add('quantiteMax')
           ->add('typeQuantite', 'sonata_type_model')

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
           ))


           ->end()

           ->with('partie 3', array('class' => 'col-md-12'))
           ->add('recetteComposes','sonata_type_collection', array('by_reference' => false), array(
                'edit' => 'inline',
                'inline' => 'table',
            ))

       ;
    }
}
