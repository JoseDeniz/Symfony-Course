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

$templating = $container->get('templating');
echo $templating->render('AppBundle:Default:index.html.twig', ['name' => 'Fry']);