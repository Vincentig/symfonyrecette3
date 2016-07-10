<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 17/06/2016
 * Time: 23:14
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class EtapeAdmin extends Admin
{
    public function configureFormFields(FormMapper $form)
    {


        $form
            ->add('numero' ,'hidden',array('attr'=>array("hidden" => true)))
            ->add('description')

        ;
    }
}
