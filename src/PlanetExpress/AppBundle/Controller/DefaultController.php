<?php

namespace PlanetExpress\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return new Response('Hello World!');
    }
    /**
     * @Route("/hello", name="helloPage")
     */
    public function helloAction()
    {
        return new Response('Hello!');
    }

    /**
     * @Route("/hello/{name}")
     * @param $name
     * @return Response
     */
    public function helloNameAction($name)
    {
        return new Response("$name! It's a trap!");
    }
}
