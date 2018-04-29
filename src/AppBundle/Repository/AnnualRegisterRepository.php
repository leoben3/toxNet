<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 17:56
 */

namespace AppBundle\Repository;

use AppBundle\Entity\AnnualRegister;
use Doctrine\ORM\EntityRepository;

class AnnualRegisterRepository extends EntityRepository
{

    public function findAllByPollutantAndWeatherStation($idPollutant,$idWeatherStation)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('p')
            ->from(AnnualRegister::class, 'p')
            ->where('p.pollutant = :idPollutant')
            ->andWhere('p.$weatherStation = :idWeatherStation')
            ->setParameters(array(

                'idPollutant' => $idPollutant,
                'idWeatherStation' => $idWeatherStation
            ))
            ->orderBy('p.year','DESC');

        $query = $qb->getQuery();
        return $query->getResult();
    }



}