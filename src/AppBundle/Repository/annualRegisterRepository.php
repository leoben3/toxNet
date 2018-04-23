<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 17:56
 */

namespace AppBundle\Repository;

use AppBundle\Entity\annualRegister;
use Doctrine\ORM\EntityRepository;

class annualRegisterRepository extends EntityRepository
{

    public function findAllByPollutantAndWeatherStation($idPollutant,$weatherStation)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('p')
            ->from(annualRegister::class, 'p')
            ->where('p.pollutant = :idPollutant')
            ->andWhere('p.$weatherStation = :idWeatherStation')
            ->setParameters(array(

                'idPollutant' => $idPollutant,
                'idWeatherStation' => $weatherStation
            ))
            ->orderBy('p.year','DESC');

        $query = $qb->getQuery();
        return $query->getResult();
    }



}