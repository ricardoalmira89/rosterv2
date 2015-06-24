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

class ScheduleRepository extends EntityRepository{


    public function getSchedules($programsId){

        $q = $this->createQueryBuilder('s')
            ->select('s','p')
            ->innerJoin('s.program','p');
        $i = 0;
        foreach($programsId as $id){
            $q->orWhere('p.id = :pid'.$i)
                ->setParameter('pid'.$i,$id);
            $i++;
        }

        return $q->getQuery()->getArrayResult();
    }

}
