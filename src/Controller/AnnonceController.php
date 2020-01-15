<?php
/**
 * Created by PhpStorm.
 * User: madatin
 * Date: 15/01/20
 * Time: 08:57
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AnnonceController
 * @package App\Controller
 *
 * @Route("/annonces")
 */
class AnnonceController extends AbstractController
{

    /**
     * @param Request $request
     * @Route("/", name="annonces_index")
     */
    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $ads = $em->getRepository("App\Entity\Annonce")->findAll();

        return $this->render("Annonce/index.html.twig", [
            "annonces" => $ads
        ]);
    }

}