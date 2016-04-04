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

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('AppBundle:Event');

        $event = $repository->findOneByName('FooName');

        return $this->render('AppBundle:Default:index.html.twig', ['event' => $event, 'name' => 'Fry']);
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
        return $this->render('AppBundle:Default:index.html.twig', ['name' => $name]);
    }
}
