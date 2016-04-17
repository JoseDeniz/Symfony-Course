<?php

namespace PlanetExpress\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_form")
     * @Template("@User/security/login.html.twig")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return [
            'last_username' => $lastUsername,
            'error' => $error,
        ];
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function logoutAction()
    {
        // this is never executed, Symfony intercepts requests to this
        //return new JsonResponse(['error' => 'you fail!']);
    }
}
