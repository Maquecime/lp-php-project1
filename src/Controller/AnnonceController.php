<?php
/**
 * Created by PhpStorm.
 * User: madatin
 * Date: 15/01/20
 * Time: 08:57
 */

namespace App\Controller;


use App\Entity\Annonce;
use App\Form\Type\AnnonceType;
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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ads = $em->getRepository("App\Entity\Annonce")->findAll();

        return $this->render("Annonce/index.html.twig", [
            "annonces" => $ads
        ]);
    }

    /**
     * @param Request $request
     * @Route("/new", name="annonces_new")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {

        $ad = new Annonce();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(AnnonceType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ad = $form->getData();

            $em->persist($ad);
            $em->flush();

            return $this->redirectToRoute("annonces_index");

        }

        return $this->render('Annonce/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}