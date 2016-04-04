<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();

// Debug file

$kernel->boot();
$container = $kernel->getContainer();
$container->set('scope', 'request');
$container->set('request', $request);

use PlanetExpress\AppBundle\Entity\Event;

$event = new Event();
$event->setName('Happy new Year!');
$event->setLocation('New York');
$event->setTime(new \DateTime('tomorrow noon'));
$event->setDetails('It\'s a surprise');

$entityManager = $container->get('doctrine')->getManager();
$entityManager->persist($event);
$entityManager->flush();


/*$templating = $container->get('templating');
echo $templating->render('AppBundle:Default:index.html.twig', ['name' => 'Fry']);*/