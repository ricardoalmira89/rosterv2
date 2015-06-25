<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 11/03/2015
 * Time: 14:57
 */

namespace Alm\RosterBundle\Entity;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository{


    public function findStudents($criteria){

        $q = $this->createQueryBuilder('s')
             ->where('s.cv = :c')
             ->orWhere('s.email = :c')
             ->orWhere('s.firstName LIKE :c')
             ->orWhere('s.lastName LIKE :c')
             ->setParameter('c','%'.$criteria.'%');

        return $q->getQuery()->getResult();
    }

}
