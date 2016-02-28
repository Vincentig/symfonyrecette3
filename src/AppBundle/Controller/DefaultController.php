<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recette;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route()
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Recette');
        $recettes = $repository->findAll();

        foreach ($recettes as $index => $recette) {

        }

        // replace this example code with whatever you need
        return $this->render('Recette/index.html.twig', [
            'recettes'=>$recettes
        ]);
    }

    /**
     *
     * @Route("/view/{id}", name="recette_view")
     */
    public function showAction(Recette $recette)
    {

        return $this->render('Recette/view.html.twig', [
            'recette'=>$recette
        ]);
    }
}
