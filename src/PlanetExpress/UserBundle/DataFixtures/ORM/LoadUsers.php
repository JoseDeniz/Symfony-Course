<?php

namespace PlanetExpress\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlanetExpress\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('fry');
        $user->setPassword($this->encodePassword($user, 'frypass'));
        $user->setRoles(['ROLE_USER']);
        $user->setEmail('fry@planetexpress.com');

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->encodePassword($admin, 'adminpass'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setEmail('admin@planetexpress.com');

        $this->persistUsers($manager, [$user, $admin]);
    }

    /**
     * @param User $user
     * @param $plainPassword
     * @return string
     */
    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     * @param User[] $users
     */
    protected function persistUsers(ObjectManager $manager, $users)
    {
        foreach ($users as $user) {
            $manager->persist($user);
        }
        $manager->flush();
    }
}