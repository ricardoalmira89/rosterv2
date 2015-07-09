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


    public function studentsSimpleSearch($criteria){

        $q = $this->createQueryBuilder('s')
             ->where('s.cv = :c')
             ->orWhere('s.email LIKE :c')
             ->orWhere('s.firstName LIKE :c')
             ->orWhere('s.lastName LIKE :c')
             ->setParameter('c','%'.$criteria.'%');

        return $q->getQuery()->getResult();
    }

    public function reportAttendanceSheet($program, $schedule, $startDate){

        $q = $this->createQueryBuilder('s')
            ->leftJoin('s.programs','p')
            ->leftJoin('s.schedules','sc')
            ->where('p = :p')
            ->andWhere('sc = :sc')
            ->andWhere('s.startDate = :sd')
            ->setParameter('p',$program)
            ->setParameter('sc',$schedule)
            ->setParameter('sd',$startDate);

        return $q->getQuery()->getResult();
    }

    public function generaCv(){

        $y = str_replace('20','2',date_format(new \DateTime('now'),'Y'));

        $q = $this->createQueryBuilder('s')
            ->setMaxResults(1)
            ->orderBy('s.cv','DESC');

        $lastCv = $q->getQuery()->getArrayResult()[0]['cv'];

        return (substr($lastCv,0,3) == $y) ? $lastCv + 1 : $y.'001';
    }

}
