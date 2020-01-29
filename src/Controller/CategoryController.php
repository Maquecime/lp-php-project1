<?php


namespace App\Controller;


use App\Entity\Category;
use App\Form\Type\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller
 *
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="category_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository("App\Entity\Category")->findAll();

        return $this->render("Category/index.html.twig", [
            'categories' => $categories,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/new", name="category_new")
     */
    public function newAction(Request $request){
        $cat = new Category();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CategoryType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();

            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute("category_index");

        }

        return $this->render('Category/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}