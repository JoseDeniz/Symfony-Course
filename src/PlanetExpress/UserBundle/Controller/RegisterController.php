<?php

namespace PlanetExpress\UserBundle\Controller;

use PlanetExpress\UserBundle\Entity\User;
use PlanetExpress\UserBundle\Form\RegisterFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @Template("UserBundle:Register:register.html.twig")
     * @param Request $request
     * @return array
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(RegisterFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $user = new User($data['username'], $data['email']);
            $user->setPassword($this->encodePassword($user, $data['password']));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('event_index'));
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param User $user
     * @param $plainPassword
     * @return string
     */
    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this->get('security.encoder_factory')->getEncoder($user);

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}
