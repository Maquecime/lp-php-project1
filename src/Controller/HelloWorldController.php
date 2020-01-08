<?php
/**
 * Created by PhpStorm.
 * User: madatin
 * Date: 08/01/20
 * Time: 09:02
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelloWorldController
 * @package App\Controller
 *
 */
class HelloWorldController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/helloworld", name="helloworld")
     */
    public function indexAction() {
        return $this->render("HelloWorld/helloworld.html.twig", [
            "name" => "Maxime & Théo"
        ]);
    }
}