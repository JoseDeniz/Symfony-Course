<?php

namespace PlanetExpress\AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PlanetExpress\AppBundle\Entity\Event;

class LoadEvents implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $fry = $manager->getRepository('UserBundle:User')->findOneByUsernameOrEmail('fry');

        $event1 = new Event();
        $event1->setName('End of year 1999!');
        $event1->setLocation('New York');
        $event1->setTime(new \DateTime('tomorrow noon'));
        $event1->setDetails('I C Wienner');
        
        $event2 = new Event();
        $event2->setName('End of year 2999!');
        $event2->setLocation('New New York');
        $event2->setTime(new \DateTime('tomorrow noon'));
        $event2->setDetails('Welcome to the future!');

        $event1->setOwner($fry);
        $event2->setOwner($fry);

        $this->persistEvents($manager, $event1, $event2);
    }

    /**
     * @param ObjectManager $manager
     * @param $event1
     * @param $event2
     */
    protected function persistEvents(ObjectManager $manager, $event1, $event2)
    {
        $manager->persist($event1);
        $manager->persist($event2);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}