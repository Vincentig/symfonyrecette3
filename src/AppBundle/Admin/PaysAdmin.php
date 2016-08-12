<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 29/06/2016
 * Time: 22:37
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class PaysAdmin
 *
 * @package AppBundle\Admin
 */
class PaysAdmin extends AbstractAdmin
{
    /**
     * configureFormFields
     *
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('nom')
            ->add('isocode2')
            ->add('isocode3')
            ;
    }
}
