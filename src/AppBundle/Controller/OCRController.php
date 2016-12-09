<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 11/11/2016
 * Time: 23:15
 */

namespace AppBundle\Controller;

use AppBundle\Form\OCRType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OCRController
 * @package AppBundle\Controller
 */
class OCRController extends Controller
{
    /**
     * ocrAction
     *
     * @Route("/admin/ocr", name="ocr")
     *
     * @return Response
     */
    public function ocrAction()
    {
        $form = $this->createForm(OCRType::class);

        return $this->render(':Admin:ocr.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
