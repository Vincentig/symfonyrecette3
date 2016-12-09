<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recette;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 * @Route()
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Recette');
        $recettes = $repository->findAll();

        $familleRepo = $em->getRepository('AppBundle:Famille');
        $familles = $familleRepo->findAll();

        $categoriesRepo = $em->getRepository('AppBundle:Categorie');
        $categories = $categoriesRepo->findAll();

        // replace this example code with whatever you need
        return $this->render('Recette/index.html.twig', [
            'recettes' => $recettes,
            'familles' => $familles,
            'categories' => $categories,
        ]);
    }

    /**
     *
     * @Route("/view/{id}", name="recette_view")
     * @param Recette $recette
     *
     * @return Response
     */
    public function showAction(Recette $recette)
    {

        return $this->render('Recette/view.html.twig', [
            'recette' => $recette,
        ]);

    }
}
