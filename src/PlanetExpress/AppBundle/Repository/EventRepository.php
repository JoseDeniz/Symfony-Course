<?php

namespace PlanetExpress\AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{

    public function findOneByName($name)
    {
        return parent::findOneBy(['name' => $name]);
    }
    
}
