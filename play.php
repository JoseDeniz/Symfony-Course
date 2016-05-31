<?php

use PlanetExpress\AppBundle\Entity\Event;
use PlanetExpress\UserBundle\Entity\User;
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

// all setup is done!

use Doctrine\ORM\EntityManager;

/** @var EntityManager $em */
$em = $container->get('doctrine')->getManager();
/** @var User $fry */
$fry = $em->getRepository('UserBundle:User')->findOneByUsernameOrEmail('fry');

/** @var $event Event */
foreach ($fry->getEvents() as $event) {
    var_dump($event->getName());
}